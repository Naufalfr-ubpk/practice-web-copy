@extends('layouts.app')
@section('title', 'Admin Dashboard')

@section('content')
    <div class="mb-6">
        <h2 class="text-3xl font-extrabold text-gray-800 dark:text-white translatable" data-id="Dashboard Admin" data-en="Admin Dashboard">Dashboard Admin</h2>
        <p class="text-gray-600 dark:text-gray-400 translatable" data-id="Ringkasan statistik dan pesanan menu terbaru FoodLumina." data-en="Summary of statistics and recent FoodLumina orders.">Ringkasan statistik dan pesanan menu terbaru FoodLumina.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="backdrop-blur-xl bg-white/70 dark:bg-gray-800/60 shadow-lg rounded-3xl p-6 border border-gray-200/50 dark:border-gray-700/50">
            <div class="text-gray-500 dark:text-gray-400 text-sm font-semibold uppercase tracking-wider translatable" data-id="Total Pesanan" data-en="Total Orders">Total Pesanan</div>
            <div class="text-4xl font-black text-gray-800 dark:text-white mt-2">{{ $totalOrders }}</div>
        </div>
        <div class="backdrop-blur-xl bg-amber-500/10 dark:bg-amber-900/20 shadow-lg rounded-3xl p-6 border border-amber-200 dark:border-amber-700">
            <div class="text-amber-700 dark:text-amber-400 text-sm font-semibold uppercase tracking-wider translatable" data-id="Pesanan Baru" data-en="New Orders">Pesanan Baru</div>
            <div class="text-4xl font-black text-amber-600 dark:text-amber-400 mt-2">{{ $newOrders }}</div>
        </div>
        <div class="backdrop-blur-xl bg-green-500/10 dark:bg-green-900/20 shadow-lg rounded-3xl p-6 border border-green-200 dark:border-green-700">
            <div class="text-green-700 dark:text-green-400 text-sm font-semibold uppercase tracking-wider translatable" data-id="Pendapatan Selesai" data-en="Total Revenue">Pendapatan Selesai</div>
            <div class="text-2xl font-black text-green-600 dark:text-green-400 mt-2">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</div>
        </div>
        <div class="backdrop-blur-xl bg-white/70 dark:bg-gray-800/60 shadow-lg rounded-3xl p-6 border border-gray-200/50 dark:border-gray-700/50">
            <div class="text-gray-500 dark:text-gray-400 text-sm font-semibold uppercase tracking-wider translatable" data-id="Total Pelanggan" data-en="Total Customers">Total Pelanggan</div>
            <div class="text-4xl font-black text-gray-800 dark:text-white mt-2">{{ $totalUsers }}</div>
        </div>
    </div>

    <div class="backdrop-blur-xl bg-white/70 dark:bg-gray-800/60 shadow-lg rounded-3xl border border-gray-200/50 dark:border-gray-700/50 overflow-hidden">
        <div class="p-6 md:p-8">
            <div class="flex justify-between items-center mb-6 border-b border-gray-100 dark:border-gray-700 pb-4">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white translatable" data-id="Pesanan Terbaru" data-en="Recent Orders">Pesanan Terbaru</h3>
                <a href="{{ route('admin.orders.index') }}" class="text-amber-500 hover:text-amber-700 dark:hover:text-amber-400 font-bold text-sm transition-colors translatable" data-id="Lihat Semua &rarr;" data-en="View All &rarr;">Lihat Semua &rarr;</a>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="text-gray-500 dark:text-gray-400 uppercase text-xs font-bold tracking-wider">
                            <th class="py-4 px-6 border-b border-gray-100 dark:border-gray-700">Invoice</th>
                            <th class="py-4 px-6 border-b border-gray-100 dark:border-gray-700 translatable" data-id="Pelanggan" data-en="Customer">Pelanggan</th>
                            <th class="py-4 px-6 border-b border-gray-100 dark:border-gray-700 translatable" data-id="Total" data-en="Total">Total</th>
                            <th class="py-4 px-6 border-b border-gray-100 dark:border-gray-700 translatable" data-id="Status" data-en="Status">Status</th>
                            <th class="py-4 px-6 border-b border-gray-100 dark:border-gray-700 text-center translatable" data-id="Aksi" data-en="Action">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 dark:text-gray-300 text-sm">
                        @forelse ($recentOrders as $order)
                            <tr class="hover:bg-gray-50/50 dark:hover:bg-gray-700/30 transition-colors">
                                <td class="py-4 px-6 text-left whitespace-nowrap font-bold text-gray-900 dark:text-white">{{ $order->invoice_number }}</td>
                                <td class="py-4 px-6 text-left">{{ $order->user->name }}</td>
                                <td class="py-4 px-6 text-left font-bold text-amber-600 dark:text-amber-400">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                                <td class="py-4 px-6 text-left">
                                    @if($order->status == 'pending')
                                        <span class="bg-yellow-100 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-300 py-1 px-3 rounded-full text-xs font-bold translatable" data-id="Menunggu Pembayaran" data-en="Pending">Menunggu Pembayaran</span>
                                    @elseif($order->status == 'processing')
                                        <span class="bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-300 py-1 px-3 rounded-full text-xs font-bold translatable" data-id="Sedang Diproses" data-en="Processing">Sedang Diproses</span>
                                    @elseif($order->status == 'shipped')
                                        <span class="bg-cyan-100 dark:bg-cyan-900/30 text-cyan-800 dark:text-cyan-400 py-1 px-3 rounded-full text-xs font-bold translatable" data-id="Diantar" data-en="Delivering">Diantar</span>
                                    @elseif($order->status == 'completed')
                                        <span class="bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-300 py-1 px-3 rounded-full text-xs font-bold translatable" data-id="Selesai" data-en="Completed">Selesai</span>
                                    @else
                                        <span class="bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-300 py-1 px-3 rounded-full text-xs font-bold">{{ ucfirst($order->status) }}</span>
                                    @endif
                                </td>
                                <td class="py-4 px-6 text-center">
                                    <a href="{{ route('admin.orders.show', $order->id) }}" class="inline-flex items-center text-amber-600 dark:text-amber-400 hover:text-amber-800 dark:hover:text-amber-300 font-bold transition translatable" data-id="Detail" data-en="Details">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-12 text-center text-gray-500 dark:text-gray-400 translatable" data-id="Belum ada pesanan." data-en="No orders yet.">Belum ada pesanan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection