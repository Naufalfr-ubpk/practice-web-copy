@extends('layouts.app')
@section('title', 'Laporan Penjualan')

@section('content')
    <div class="mb-6">
        <h2 class="text-3xl font-extrabold text-gray-800 dark:text-white translatable" data-id="Laporan Penjualan" data-en="Sales Report">Laporan Penjualan</h2>
        <p class="text-gray-600 dark:text-gray-400 translatable" data-id="Filter dan cetak riwayat transaksi FoodLumina (Hanya Pesanan Selesai)." data-en="Filter and print FoodLumina transaction history (Completed Orders Only).">Filter dan cetak riwayat transaksi FoodLumina (Hanya Pesanan Selesai).</p>
    </div>

    <div class="backdrop-blur-xl bg-white/70 dark:bg-gray-800/60 p-6 shadow-lg rounded-3xl border border-gray-200/50 dark:border-gray-700/50 mb-8 transition-colors">
        <form action="{{ route('admin.reports.index') }}" method="GET" class="flex flex-col md:flex-row items-end gap-4">
            <div class="flex-1 w-full">
                <label class="block text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2 translatable" data-id="Tanggal Mulai" data-en="Start Date">Tanggal Mulai</label>
                <input type="date" name="start_date" value="{{ request('start_date') }}" class="w-full rounded-xl border-gray-200 dark:border-gray-700 bg-white/50 dark:bg-gray-900/50 text-sm text-gray-900 dark:text-white font-bold focus:border-amber-500 focus:ring-amber-500/20 transition-all">
            </div>
            <div class="flex-1 w-full">
                <label class="block text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2 translatable" data-id="Tanggal Akhir" data-en="End Date">Tanggal Akhir</label>
                <input type="date" name="end_date" value="{{ request('end_date') }}" class="w-full rounded-xl border-gray-200 dark:border-gray-700 bg-white/50 dark:bg-gray-900/50 text-sm text-gray-900 dark:text-white font-bold focus:border-amber-500 focus:ring-amber-500/20 transition-all">
            </div>
            <div class="flex gap-3 w-full md:w-auto mt-4 md:mt-0">
                <button type="submit" class="flex-1 md:flex-none bg-amber-500 text-white px-8 py-3 rounded-xl hover:bg-amber-600 font-bold transition-all shadow-lg shadow-amber-500/25">
                    <span class="translatable" data-id="Filter Data" data-en="Filter Data">Filter Data</span>
                </button>
                <a href="{{ route('admin.reports.index') }}" class="flex-1 md:flex-none text-center bg-gray-100 hover:bg-gray-200 text-gray-700 dark:bg-gray-700/50 dark:hover:bg-gray-600 dark:text-gray-200 px-6 py-3 rounded-xl font-bold transition-colors">
                    <span class="translatable" data-id="Reset" data-en="Reset">Reset</span>
                </a>
            </div>
        </form>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div class="bg-amber-50 dark:bg-amber-900/20 p-6 rounded-3xl border border-amber-100 dark:border-amber-800/50 flex justify-between items-center transition-colors">
            <div>
                <div class="text-amber-800 dark:text-amber-400 text-sm font-bold uppercase tracking-wider translatable" data-id="Total Penjualan Selesai" data-en="Total Completed Sales">Total Penjualan Selesai</div>
                <div class="text-3xl font-black text-amber-600 dark:text-amber-300 mt-1">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</div>
            </div>
            <div class="bg-white dark:bg-amber-800 p-4 rounded-2xl shadow-sm text-amber-500 dark:text-amber-200">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            </div>
        </div>
        <div class="bg-blue-50 dark:bg-blue-900/20 p-6 rounded-3xl border border-blue-100 dark:border-blue-800/50 flex justify-between items-center transition-colors">
            <div>
                <div class="text-blue-800 dark:text-blue-400 text-sm font-bold uppercase tracking-wider translatable" data-id="Jumlah Transaksi" data-en="Total Transactions">Jumlah Transaksi</div>
                <div class="text-3xl font-black text-blue-600 dark:text-blue-300 mt-1">{{ $totalOrders }} <span class="text-lg font-bold translatable" data-id="Pesanan" data-en="Orders">Pesanan</span></div>
            </div>
            <div class="bg-white dark:bg-blue-800 p-4 rounded-2xl shadow-sm text-blue-500 dark:text-blue-200">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" /></svg>
            </div>
        </div>
    </div>

    <div class="backdrop-blur-xl bg-white/70 dark:bg-gray-800/60 p-6 md:p-8 shadow-lg rounded-3xl border border-gray-200/50 dark:border-gray-700/50 transition-colors">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4 border-b border-gray-100 dark:border-gray-700 pb-4">
            <div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white translatable" data-id="Rincian Transaksi Selesai" data-en="Completed Transaction Details">Rincian Transaksi Selesai</h3>
                @if($startDate && $endDate)
                    <p class="text-sm font-bold text-gray-500 dark:text-gray-400 mt-1">
                        <span class="translatable" data-id="Periode:" data-en="Period:">Periode:</span> {{ \Carbon\Carbon::parse($startDate)->format('d M Y') }} s/d {{ \Carbon\Carbon::parse($endDate)->format('d M Y') }}
                    </p>
                @endif
            </div>

            <a href="{{ route('admin.reports.print', ['start_date' => request('start_date'), 'end_date' => request('end_date')]) }}" target="_blank" class="bg-gray-900 dark:bg-gray-100 text-white dark:text-gray-900 px-5 py-3 rounded-xl font-bold text-sm flex items-center gap-2 hover:bg-black dark:hover:bg-white shadow-lg transition-transform transform hover:-translate-y-0.5">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                <span class="translatable" data-id="Print Laporan" data-en="Print Report">Print Laporan</span>
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="text-gray-500 dark:text-gray-400 uppercase text-xs font-bold tracking-wider">
                        <th class="py-4 px-4 border-b border-gray-100 dark:border-gray-700">No</th>
                        <th class="py-4 px-4 border-b border-gray-100 dark:border-gray-700 translatable" data-id="Tanggal Order" data-en="Order Date">Tanggal Order</th>
                        <th class="py-4 px-4 border-b border-gray-100 dark:border-gray-700">Invoice</th>
                        <th class="py-4 px-4 border-b border-gray-100 dark:border-gray-700 translatable" data-id="Pelanggan" data-en="Customer">Pelanggan</th>
                        <th class="py-4 px-4 border-b border-gray-100 dark:border-gray-700 text-right translatable" data-id="Nominal" data-en="Amount">Nominal</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 dark:text-gray-300 text-sm">
                    @forelse ($orders as $idx => $order)
                        <tr class="border-b border-gray-100 dark:border-gray-700 hover:bg-gray-50/50 dark:hover:bg-gray-700/30 transition">
                            <td class="py-4 px-4 font-bold">{{ $idx + 1 }}</td>
                            <td class="py-4 px-4 font-medium">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                            <td class="py-4 px-4 font-bold text-gray-900 dark:text-white">{{ $order->invoice_number }}</td>
                            <td class="py-4 px-4 font-medium">{{ $order->user->name }}</td>
                            <td class="py-4 px-4 text-right font-bold text-amber-600 dark:text-amber-400">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-12 text-center text-gray-500 font-medium translatable" data-id="Tidak ada transaksi selesai pada periode ini." data-en="No completed transactions in this period.">Tidak ada transaksi selesai pada periode ini.</td>
                        </tr>
                    @endforelse
                </tbody>
                @if(count($orders) > 0)
                    <tfoot>
                        <tr class="font-bold">
                            <td colspan="4" class="py-6 px-4 text-right text-gray-500 dark:text-gray-400 uppercase text-xs tracking-wider translatable" data-id="TOTAL KESELURUHAN :" data-en="GRAND TOTAL :">TOTAL KESELURUHAN :</td>
                            <td class="py-6 px-4 text-right text-amber-600 dark:text-amber-400 text-xl">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</td>
                        </tr>
                    </tfoot>
                @endif
            </table>
        </div>
    </div>
@endsection