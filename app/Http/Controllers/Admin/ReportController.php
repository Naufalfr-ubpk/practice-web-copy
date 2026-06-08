<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;

class ReportController extends Controller
{
    /**
     * Tampilkan halaman laporan dengan filter & agregasi
     */
    public function index(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        // Query dasar: Hanya pesanan kuliner yang berstatus selesai
        $query = Order::where('status', 'completed');

        // Terapkan filter rentang tanggal jika dipilih oleh admin
        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [
                Carbon::parse($startDate)->startOfDay(),
                Carbon::parse($endDate)->endOfDay()
            ]);
        }

        // Hitung agregasi data penjualan secara dinamis
        $totalRevenue = $query->sum('total_amount');
        $totalOrders = $query->count();

        // Ambil data untuk tabel rincian
        $orders = $query->with('user')->latest()->get();

        return view('admin.reports.index', compact('orders', 'totalRevenue', 'totalOrders', 'startDate', 'endDate'));
    }

    /**
     * Render layar cetak polos untuk HTML Print / PDF
     */
    public function print(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        $query = Order::where('status', 'completed');

        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [
                Carbon::parse($startDate)->startOfDay(),
                Carbon::parse($endDate)->endOfDay()
            ]);
        }

        $totalRevenue = $query->sum('total_amount');
        $orders = $query->with('user')->latest()->get();

        return view('admin.reports.print', compact('orders', 'totalRevenue', 'startDate', 'endDate'));
    }
}