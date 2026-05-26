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
        $user = Auth::user();
        $cart = Cart::with('items.product')->where('user_id', $user->id)->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang pesanan Anda kosong.');
        }

        $total = $cart->items->sum(function($item) {
            return $item->quantity * $item->product->price;
        });

        return view('checkout.index', compact('cart', 'total'));
    }

    /**
     * Menyimpan data order awal (Status: Pending)
     */
    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|string|min:10',
            'phone' => 'required|string|min:10',
        ]);

        $user = Auth::user();
        $cart = Cart::with('items.product')->where('user_id', $user->id)->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Tidak ada sajian untuk di-checkout.');
        }

        DB::beginTransaction();
        try {
            $totalAmount = $cart->items->sum(function($item) {
                return $item->quantity * $item->product->price;
            });

            // 1. Buat Order
            $order = Order::create([
                'user_id' => $user->id,
                'invoice_number' => 'INV-' . strtoupper(Str::random(10)),
                'total_amount' => $totalAmount,
                'status' => 'pending',
                'shipping_address' => $request->address,
                'phone' => $request->phone,
            ]);

            // 2. Pindahkan items
            foreach ($cart->items as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'product_name' => $item->product->name,
                    'price' => $item->product->price,
                    'quantity' => $item->quantity,
                ]);
            }

            // 3. Kosongkan keranjang
            $cart->items()->delete();

            DB::commit();
            return redirect()->route('checkout.payment', $order->invoice_number);

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
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