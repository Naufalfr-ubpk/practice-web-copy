<?php 
 
namespace App\Http\Controllers; 
 
use Illuminate\Http\Request; 
 
class CheckoutController extends Controller 
{ 
    /** * Menampilkan halaman proses checkout 
     */ 
    public function index() 
    { 
        return "Ini adalah Halaman Checkout"; 
    } 
}