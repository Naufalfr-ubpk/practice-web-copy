<?php 
 
namespace App\Http\Controllers; 
 
use Illuminate\Http\Request; 
 
class CartController extends Controller 
{ 
    /** * Menampilkan halaman keranjang belanja 
     */ 
    public function index() 
    { 
        return "Ini adalah Halaman Keranjang Belanja"; 
    } 
}