<?php 
 
namespace App\Http\Controllers\Admin; 
 
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request; 
 
class ReportController extends Controller 
{ 
    /** * Menampilkan halaman laporan penjualan 
     */ 
    public function index() 
    { 
        return "Ini adalah Halaman Laporan Penjualan (Praktikum 9 Nanti)"; 
    } 
}