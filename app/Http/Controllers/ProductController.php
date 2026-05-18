<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Menampilkan daftar semua produk
     */
    public function index()
    {
        // Ambil semua produk dari database yang aktif
        $products = Product::with('category')->where('is_active', true)
                           ->orderBy('created_at', 'desc')
                           ->get();

        // Format data agar sesuai dengan view (mengakomodasi translate yang lu bikin sebelumnya)
        $formattedProducts = $products->map(function ($product) {
            return [
                'id' => $product->id,
                'name_id' => $product->name,
                'name_en' => $product->name,
                'slug' => $product->slug,
                'price' => $product->price,
                'category_id' => $product->category->name ?? 'Menu',
                'category_en' => $product->category->name ?? 'Menu',
                'image' => $product->image ?? 'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?auto=format&fit=crop&w=800&q=80',
            ];
        });

        return view('products.index', ['products' => $formattedProducts]);
    }

    /**
     * Menampilkan detail satu produk berdasarkan slug
     */
    public function show($slug)
    {
        // Ambil data produk berdasarkan slug atau 404 jika tidak ditemukan
        $productData = Product::with('category')->where('slug', $slug)->firstOrFail();
        
        // Format agar sesuai dengan struktur view show.blade.php
        $product = [
            'id' => $productData->id, 
            'name_id' => $productData->name, 
            'name_en' => $productData->name, 
            'slug' => $productData->slug,
            'price' => $productData->price, 
            'category_id' => $productData->category->name ?? 'Sajian Spesial', 
            'category_en' => $productData->category->name ?? 'Special Dish', 
            'image' => $productData->image ?? 'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?auto=format&fit=crop&w=800&q=80',
            'description' => $productData->description,
            'stock' => $productData->stock,
            'specifications' => [
                'SKU' => $productData->sku,
                'Status' => $productData->is_active ? 'Tersedia' : 'Habis'
            ]
        ];

        return view('products.show', compact('product'));
    }
}