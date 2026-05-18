<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Menampilkan halaman keranjang pesanan
     */
    public function index()
    {
        $user = Auth::user();
        
        // Ambil cart user beserta item dan detail produk di dalamnya
        $cart = Cart::with(['items.product'])->firstOrCreate(['user_id' => $user->id]);

        // Hitung total harga tagihan
        $total = $cart->items->sum(function($item) {
            return $item->quantity * $item->product->price;
        });

        return view('cart.index', compact('cart', 'total'));
    }

    /**
     * Menambahkan sajian ke dalam keranjang
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $user = Auth::user();

        // Cari atau buat keranjang baru untuk user ini
        $cart = Cart::firstOrCreate(['user_id' => $user->id]);

        // Cek apakah sajian ini sudah ada di keranjang
        $cartItem = CartItem::where('cart_id', $cart->id)
                            ->where('product_id', $request->product_id)
                            ->first();

        if ($cartItem) {
            // Jika sudah ada, tinggal tambah quantity/porsinya
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            // Jika belum ada, buat pesanan baru di keranjang
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Sajian berhasil ditambahkan ke pesanan!');
    }

    /**
     * Mengupdate jumlah porsi di keranjang
     */
    public function update(Request $request, $id)
    {
        $request->validate(['quantity' => 'required|integer|min:1']);

        $cartItem = CartItem::whereHas('cart', function($q) {
            $q->where('user_id', Auth::id());
        })->findOrFail($id);

        $cartItem->update(['quantity' => $request->quantity]);

        return redirect()->back()->with('success', 'Jumlah porsi berhasil disesuaikan!');
    }

    /**
     * Menghapus sajian dari keranjang
     */
    public function destroy($id)
    {
        $cartItem = CartItem::whereHas('cart', function($q) {
            $q->where('user_id', Auth::id());
        })->findOrFail($id);

        $cartItem->delete();

        return redirect()->back()->with('success', 'Sajian dibatalkan dari pesanan.');
    }
}