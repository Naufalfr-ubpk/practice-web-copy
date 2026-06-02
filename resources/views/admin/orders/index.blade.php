@extends('layouts.app')
@section('title', 'Manajemen Pesanan')

@section('content')
    <div class="mb-6">
        <h2 class="text-3xl font-extrabold text-gray-800 dark:text-white translatable" data-id="Manajemen Pesanan" data-en="Order Management">Manajemen Pesanan</h2>
        <p class="text-gray-600 dark:text-gray-400 translatable" data-id="Kelola semua transaksi kuliner yang masuk ke FoodLumina." data-en="Manage all culinary transactions entering FoodLumina.">Kelola semua transaksi kuliner yang masuk ke FoodLumina.</p>
    </div>

    <div class="backdrop-blur-xl bg-white/70 dark:bg-gray-800/60 shadow-lg rounded-3xl border border-gray-200/50 dark:border-gray-700/50 overflow-hidden">
        <div class="p-6 md:p-8">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="text-gray-500 dark:text-gray-400 uppercase text-xs font-bold tracking-wider">
                            <th class="py-4 px-6 border-b border-gray-100 dark:border-gray-700 translatable" data-id="Tanggal" data-en="Date">Tanggal</th>
                            <th class="py-4 px-6 border-b border-gray-100 dark:border-gray-700">Invoice</th>
                            <th class="py-4 px-6 border-b border-gray-100 dark:border-gray-700 translatable" data-id="Pelanggan" data-en="Customer">Pelanggan</th>
                            <th class="py-4 px-6 border-b border-gray-100 dark:border-gray-700 translatable" data-id="Total" data-en="Total">Total</th>
                            <th class="py-4 px-6 border-b border-gray-100 dark:border-gray-700 translatable" data-id="Status" data-en="Status">Status</th>
                            <th class="py-4 px-6 border-b border-gray-100 dark:border-gray-700 text-center translatable" data-id="Aksi" data-en="Action">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 dark:text-gray-300 text-sm">
                        @forelse ($orders as $order)
                            <tr class="hover:bg-gray-50/50 dark:hover:bg-gray-700/30 transition-colors">
                                <td class="py-4 px-6 text-left whitespace-nowrap">{{ $order->created_at->format('d M Y H:i') }}</td>
                                <td class="py-4 px-6 text-left font-bold text-gray-900 dark:text-white">{{ $order->invoice_number }}</td>
                                <td class="py-4 px-6 text-left">{{ $order->user->name }}</td>
                                <td class="py-4 px-6 text-left font-bold text-amber-600 dark:text-amber-400">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                                <td class="py-4 px-6 text-left">
                                    @if($order->status == 'pending')
                                        <span class="bg-yellow-100 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-300 py-1.5 px-3 rounded-full text-xs font-bold translatable" data-id="Menunggu Pembayaran" data-en="Pending">Menunggu Pembayaran</span>
                                    @elseif($order->status == 'processing')
                                        <span class="bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-300 py-1.5 px-3 rounded-full text-xs font-bold translatable" data-id="Sedang Diproses" data-en="Processing">Sedang Diproses</span>
                                    @elseif($order->status == 'shipped')
                                        <span class="bg-cyan-100 dark:bg-cyan-900/30 text-cyan-800 dark:text-cyan-400 py-1.5 px-3 rounded-full text-xs font-bold translatable" data-id="Diantar" data-en="Delivering">Diantar</span>
                                    @elseif($order->status == 'completed')
                                        <span class="bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-300 py-1.5 px-3 rounded-full text-xs font-bold translatable" data-id="Selesai" data-en="Completed">Selesai</span>
                                    @else
                                        <span class="bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-300 py-1.5 px-3 rounded-full text-xs font-bold">{{ ucfirst($order->status) }}</span>
                                    @endif
                                </td>
                                <td class="py-4 px-6 text-center">
                                    <a href="{{ route('admin.orders.show', $order->id) }}" class="inline-flex items-center justify-center bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 rounded-xl text-sm font-bold transition-all shadow-md shadow-amber-500/10 translatable" data-id="Detail" data-en="Details">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-12 text-center text-gray-500 dark:text-gray-400 translatable" data-id="Belum ada pesanan terdaftar." data-en="No registered orders yet.">Belum ada pesanan terdaftar.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="mt-6 border-t border-gray-100 dark:border-gray-700 pt-4">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
@endsection