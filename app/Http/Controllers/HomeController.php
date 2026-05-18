<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Wajib dipanggil biar bisa konek ke tabel products

class HomeController extends Controller
{
    public function index()
    {
        // Ambil 5 produk terbaru dari database untuk ditampilkan di carousel/grid
        $products = Product::with('category')->where('is_active', true)
                           ->orderBy('created_at', 'desc')
                           ->take(5)
                           ->get();

        // Format datanya biar nyambung sama sistem terjemahan (translatable) yang udah lu bikin
        $featuredProducts = $products->map(function ($product) {
            return [
                'id' => $product->id,
                'name_id' => $product->name,
                'name_en' => $product->name,
                'slug' => $product->slug, // Sekarang slug-nya ngambil asli dari database
                'price' => $product->price,
                'category_id' => $product->category->name ?? 'Menu Spesial',
                'category_en' => $product->category->name ?? 'Special Menu',
                'image' => $product->image ?? 'https://images.unsplash.com/photo-1544025162-8360d0061e8e?auto=format&fit=crop&w=800&q=80',
                'stock' => $product->stock,
            ];
        });

        return view('home', compact('featuredProducts'));
    }
}