<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Laporan Penjualan - FoodLumina</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Sembunyikan elemen yang tidak perlu saat di print */
        @media print {
            .no-print { display: none !important; }
            body { background-color: white; color: black; }
        }
        body { font-family: 'Arial', sans-serif; }
    </style>
</head>
<body class="bg-white text-gray-900 p-8 max-w-4xl mx-auto">

    <div class="text-center mb-8 border-b-2 border-gray-900 pb-6">
        <h1 class="text-3xl font-black mb-1">FOOD<span class="text-amber-600">LUMINA</span></h1>
        <h2 class="text-xl font-bold uppercase tracking-wider text-gray-700">Laporan Transaksi Penjualan</h2>
        <p class="text-sm text-gray-500 mt-2">
            @if($startDate && $endDate)
                Periode: {{ \Carbon\Carbon::parse($startDate)->format('d F Y') }} - {{ \Carbon\Carbon::parse($endDate)->format('d F Y') }}
            @else
                Periode: Keseluruhan Data (All Time)
            @endif
        </p>
    </div>

    <div class="flex justify-between mb-8 text-sm border border-gray-300 p-4 rounded-lg bg-gray-50">
        <div>
            <p class="font-semibold text-gray-500 uppercase">Jumlah Transaksi Selesai</p>
            <p class="text-2xl font-bold">{{ count($orders) }} Pesanan</p>
        </div>
        <div class="text-right">
            <p class="font-semibold text-gray-500 uppercase">Total Omzet Pendapatan</p>
            <p class="text-2xl font-bold">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</p>
        </div>
    </div>

    <table class="w-full text-left border-collapse text-sm">
        <thead>
            <tr class="border-b-2 border-gray-900 bg-gray-100">
                <th class="py-3 px-2">No</th>
                <th class="py-3 px-2">Tanggal</th>
                <th class="py-3 px-2">No. Invoice</th>
                <th class="py-3 px-2">Nama Pelanggan</th>
                <th class="py-3 px-2 text-right">Nominal (Rp)</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $idx => $order)
                <tr class="border-b border-gray-200">
                    <td class="py-3 px-2">{{ $idx + 1 }}</td>
                    <td class="py-3 px-2">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                    <td class="py-3 px-2 font-semibold">{{ $order->invoice_number }}</td>
                    <td class="py-3 px-2">{{ $order->user->name }}</td>
                    <td class="py-3 px-2 text-right">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="py-8 text-center text-gray-500 italic">Tidak ada data transaksi pada rentang waktu ini.</td>
                </tr>
            @endforelse
        </tbody>
        @if(count($orders) > 0)
            <tfoot>
                <tr class="border-t-2 border-gray-900">
                    <td colspan="4" class="py-4 px-2 text-right font-bold uppercase tracking-wider">Total Keseluruhan :</td>
                    <td class="py-4 px-2 text-right font-bold text-lg">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</td>
                </tr>
            </tfoot>
        @endif
    </table>

    <div class="mt-12 flex justify-between text-xs text-gray-500">
        <p>Dicetak pada: {{ \Carbon\Carbon::now()->format('d M Y H:i:s') }}</p>
        <p>Oleh: {{ Auth::user()->name }} (Admin)</p>
    </div>

    <div class="mt-8 text-center no-print">
        <button onclick="window.print()" class="bg-gray-900 text-white px-6 py-2 rounded-lg shadow hover:bg-black font-semibold">
            Cetak Sekarang
        </button>
        <p class="text-xs text-gray-400 mt-2">*Tekan tombol di atas atau tekan Ctrl+P untuk mencetak laporan ini.</p>
    </div>

    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>
</html>