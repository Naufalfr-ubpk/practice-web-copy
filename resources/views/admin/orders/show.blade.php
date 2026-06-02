@extends('layouts.app')
@section('title', 'Detail Pesanan ' . $order->invoice_number)

@section('content')
    <div class="mb-6 flex items-center gap-3">
        <a href="{{ route('admin.orders.index') }}" class="text-amber-500 hover:text-amber-700 bg-white/80 dark:bg-gray-800/80 p-2.5 rounded-full shadow-md backdrop-blur-md transition-colors border border-gray-200/50 dark:border-gray-700/50">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
            </svg>
        </a>
        <h2 class="text-2xl font-extrabold text-gray-800 dark:text-white"><span class="translatable" data-id="Detail Pesanan" data-en="Order Details">Detail Pesanan</span> <span class="text-amber-500">#{{ $order->invoice_number }}</span></h2>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 rounded-xl bg-green-50/80 dark:bg-green-900/20 text-green-600 dark:text-green-400 border border-green-200 dark:border-green-800 flex items-center gap-3 backdrop-blur-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
            <span class="font-bold translatable" data-id="Status pesanan kuliner berhasil diperbarui!" data-en="Culinary order status successfully updated!">Status pesanan kuliner berhasil diperbarui!</span>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        {{-- KOLOML KIRI: Daftar Menu Kuliner --}}
        <div class="lg:col-span-2 space-y-8">
            <div class="backdrop-blur-xl bg-white/70 dark:bg-gray-800/60 shadow-lg rounded-3xl border border-gray-200/50 dark:border-gray-700/50 overflow-hidden">
                <div class="p-6 md:p-8">
                    <h3 class="text-lg font-bold mb-6 text-gray-900 dark:text-white border-b border-gray-100 dark:border-gray-700 pb-4 translatable" data-id="Daftar Hidangan yang Dipesan" data-en="List of Ordered Dishes">Daftar Hidangan yang Dipesan</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="text-gray-500 dark:text-gray-400 uppercase text-xs font-bold tracking-wider">
                                    <th class="py-3 px-4 border-b border-gray-100 dark:border-gray-700 translatable" data-id="Sajian" data-en="Dish">Sajian</th>
                                    <th class="py-3 px-4 text-right border-b border-gray-100 dark:border-gray-700 translatable" data-id="Harga" data-en="Price">Harga</th>
                                    <th class="py-3 px-4 text-center border-b border-gray-100 dark:border-gray-700">Qty</th>
                                    <th class="py-3 px-4 text-right border-b border-gray-100 dark:border-gray-700">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 dark:text-gray-300 text-sm">
                                @foreach ($order->items as $item)
                                    <tr class="border-b border-gray-100 dark:border-gray-700">
                                        <td class="py-4 px-4 font-bold text-gray-900 dark:text-white">
                                            {{ $item->product_name ?? ($item->product->name ?? 'Menu Dihapus') }}
                                        </td>
                                        <td class="py-4 px-4 text-right">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                        <td class="py-4 px-4 text-center font-bold">{{ $item->quantity }}</td>
                                        <td class="py-4 px-4 text-right font-bold text-gray-900 dark:text-white">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="font-bold">
                                    <td colspan="3" class="py-6 px-4 text-right text-gray-500 dark:text-gray-400 uppercase text-xs tracking-wider translatable" data-id="Total Pembayaran :" data-en="Total Payment :">Total Pembayaran :</td>
                                    <td class="py-6 px-4 text-right text-xl text-amber-600 dark:text-amber-400">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- KOLOM KANAN: Manajemen & Info Pengiriman --}}
        <div class="space-y-8">
            <div class="backdrop-blur-xl bg-white/70 dark:bg-gray-800/60 shadow-lg rounded-3xl border border-gray-200/50 dark:border-gray-700/50 p-6">
                <h3 class="text-lg font-bold mb-4 text-gray-900 dark:text-white flex items-center gap-2 border-b border-gray-100 dark:border-gray-700 pb-3 translatable" data-id="Ubah Status Pesanan" data-en="Change Order Status">
                    Ubah Status Pesanan
                </h3>

              <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-5">
                        <label for="status" class="block text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2 translatable" data-id="Pilih Status Baru" data-en="Select New Status">Pilih Status Baru</label>
                        <select name="status" id="status" class="w-full rounded-xl border-gray-200 dark:border-gray-700 bg-white/50 dark:bg-gray-900/50 text-sm text-gray-900 dark:text-white font-bold focus:border-amber-500 focus:ring-amber-500/20 transition-all">
                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }} class="translatable" data-id="Pending (Belum Dibayar)" data-en="Pending (Unpaid)">Pending (Belum Dibayar)</option>
                            <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }} class="translatable" data-id="Processing (Sedang Dimasak)" data-en="Processing (Cooking)">Processing (Sedang Dimasak)</option>
                            <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }} class="translatable" data-id="Shipped (Sedang Diantar)" data-en="Shipped (Delivering)">Shipped (Sedang Diantar)</option>
                            <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }} class="translatable" data-id="Completed (Selesai)" data-en="Completed (Done)">Completed (Selesai)</option>
                            <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }} class="translatable" data-id="Cancelled (Dibatalkan)" data-en="Cancelled (Canceled)">Cancelled (Dibatalkan)</option>
                        </select>
                    </div>
                    <button type="submit" class="w-full bg-amber-500 hover:bg-amber-600 text-white py-3 px-4 rounded-xl transition-all shadow-lg shadow-amber-500/25 font-bold flex justify-center items-center gap-2">
                        <span class="translatable" data-id="Perbarui Status" data-en="Update Status">Perbarui Status</span>
                    </button>
                </form>

            </div>

            <div class="backdrop-blur-xl bg-white/70 dark:bg-gray-800/60 shadow-lg rounded-3xl border border-gray-200/50 dark:border-gray-700/50 p-6">
                <h3 class="text-lg font-bold mb-4 text-gray-900 dark:text-white flex items-center gap-2 border-b border-gray-100 dark:border-gray-700 pb-3 translatable" data-id="Informasi Pengiriman" data-en="Delivery Information">
                    Informasi Pengiriman
                </h3>
                <div class="space-y-4 mt-4 text-sm">
                    <div class="bg-gray-50/50 dark:bg-gray-900/40 p-3.5 rounded-2xl border border-gray-100 dark:border-gray-700/50">
                        <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1 translatable" data-id="Nama Pemesan" data-en="Customer Name">Nama Pemesan</span>
                        <span class="font-bold text-gray-800 dark:text-white text-base">{{ $order->user->name }}</span>
                        <div class="text-xs text-gray-500 mt-0.5">{{ $order->user->email }}</div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-gray-50/50 dark:bg-gray-900/40 p-3.5 rounded-2xl border border-gray-100 dark:border-gray-700/50">
                            <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1 translatable" data-id="Nomor HP" data-en="Phone Number">Nomor HP</span>
                            <span class="font-bold text-gray-800 dark:text-white">{{ $order->phone }}</span>
                        </div>
                        <div class="bg-gray-50/50 dark:bg-gray-900/40 p-3.5 rounded-2xl border border-gray-100 dark:border-gray-700/50">
                            <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1 translatable" data-id="Tanggal" data-en="Date">Tanggal</span>
                            <span class="font-bold text-gray-800 dark:text-white">{{ $order->created_at->format('d M Y') }}</span>
                        </div>
                    </div>
                    <div class="bg-gray-50/50 dark:bg-gray-900/40 p-3.5 rounded-2xl border border-gray-100 dark:border-gray-700/50">
                        <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1 translatable" data-id="Alamat Antar" data-en="Destination Address">Alamat Antar</span>
                        <span class="font-medium text-gray-800 dark:text-white leading-relaxed block mt-1">{{ $order->shipping_address }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection