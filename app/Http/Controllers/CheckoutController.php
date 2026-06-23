<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    /**
     * Menampilkan halaman proses checkout (Isi Alamat)
     */


    public function index()
    {
        $cart = Cart::with('items.product')->where('user_id', Auth::id())->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang belanja Anda masih kosong.');
        }

        // REFACTORING 1: Gaya Looping Aman (Anti Error Sum Warning & Nullsafe)
        $total = 0;
        foreach ($cart->items as $item) {
            $total += $item->quantity * ($item->product?->price ?? 0);
        }

        return view('checkout.index', compact('cart', 'total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'phone' => 'required|string|min:11|max:13',
            'address' => 'required|string|min:10',
        ]);

        $user = Auth::user();
        $cart = Cart::with('items.product')->where('user_id', $user->id)->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang belanja Anda masih kosong.');
        }

        DB::beginTransaction();
        try {
            // REFACTORING 2: Gaya Looping Aman di Proses Store Database
            $totalAmount = 0;
            foreach ($cart->items as $item) {
                $totalAmount += $item->quantity * ($item->product?->price ?? 0);
            }

            // 1. Buat Order
            $order = Order::create([
                'user_id' => $user->id,
                'invoice_number' => 'INV-' . strtoupper(Str::random(10)),
                'total_amount' => $totalAmount,
                'status' => 'pending',
                'shipping_address' => $request->address,
                'phone' => $request->phone,
            ]);

            // 2. Pindahkan items (Aman dari Bug Produk Hilang)
            foreach ($cart->items as $item) {
                // REFACTORING 3: Perlindungan Murni - Lewati Jika Produk Keburu Dihapus
                if (!$item->product) continue; 
                
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'product_name' => $item->product->name,
                    'price' => $item->product->price,
                    'quantity' => $item->quantity,
                ]);
            }

            // 3. Bersihkan keranjang
            $cart->items()->delete();
            $cart->delete();

            DB::commit();

            return redirect()->route('checkout.payment', $order->invoice_number)
                ->with('success', 'Pesanan berhasil dibuat! Silakan lanjutkan ke pembayaran.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan saat memproses pesanan: ' . $e->getMessage());
        }
    }


    /**
     * Halaman Simulasi Pembayaran
     */
    public function payment($invoice)
    {
        $order = Order::where('invoice_number', $invoice)
                      ->where('user_id', Auth::id())
                      ->firstOrFail();

        return view('checkout.payment', compact('order'));
    }

    /**
     * Proses Simulasi Bayar
     */
    public function pay(Request $request, $invoice)
    {
        $order = Order::where('invoice_number', $invoice)
                      ->where('user_id', Auth::id())
                      ->firstOrFail();

        // Update status menjadi processing (dianggap sudah bayar)
        $order->update(['status' => 'processing']);

        return redirect()->route('checkout.success')->with('success', 'Pembayaran berhasil dikonfirmasi!');
    }

    /**
     * Halaman Sukses
     */
    public function success()
    {
        return view('checkout.success');
    }
}