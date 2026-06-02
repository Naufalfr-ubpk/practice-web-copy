<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Menampilkan daftar semua pesanan masuk.
     */
    public function index()
    {
        // Ambil pesanan terbaru dengan relasi user dan bikin pagination 10 data
        $orders = Order::with('user')->latest()->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Menampilkan detail satu pesanan tertentu.
     */
    public function show(string $id)
    {
        // Ambil detail order beserta item sajian di dalamnya
        $order = Order::with(['user', 'items.product'])->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Memperbarui status proses pesanan/sajian makanan.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,shipped,completed,cancelled'
        ]);

        $order = Order::findOrFail($id);
        $order->update([
            'status' => $request->status
        ]);

        return redirect()->route('admin.orders.show', $order->id)
                         ->with('success', 'Status pesanan kuliner berhasil diperbarui!');
    }
}