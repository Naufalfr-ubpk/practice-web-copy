<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Menampilkan daftar semua produk
     */
    public function index()
    {
        // DATA DUMMY SEMUA PRODUK (Hanya untuk keperluan Praktikum 4)
        $products = [
            [
                'id' => 1, 'name' => 'Laptop ASUS ROG Zephyrus G14 (2024)', 'price' => 28500000, 'category' => 'Laptop Gaming', 
                'image' => 'https://images.unsplash.com/photo-1603302576837-37561b2e2302?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
            ],
            [
                'id' => 2, 'name' => 'VGA NVIDIA RTX 4080 Super 16GB', 'price' => 18900000, 'category' => 'Graphics Card', 
                'image' => 'https://images.unsplash.com/photo-1591488320449-011701bb6704?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
            ],
            [
                'id' => 3, 'name' => 'RAM Corsair Vengeance RGB 32GB DDR5', 'price' => 3200000, 'category' => 'Memory (RAM)', 
                'image' => 'https://images.unsplash.com/photo-1541029071515-84cc54f84dc5?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
            ],
            [
                'id' => 4, 'name' => 'SSD Samsung 990 PRO 2TB NVMe', 'price' => 2800000, 'category' => 'Storage', 
                'image' => 'https://images.unsplash.com/photo-1597852074816-d933c7d2b988?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
            ],
            [
                'id' => 5, 'name' => 'Monitor LG UltraGear 27" 144Hz', 'price' => 4500000, 'category' => 'Monitor', 
                'image' => 'https://images.unsplash.com/photo-1527443224154-c4a3942d3acf?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
            ],
            [
                'id' => 6, 'name' => 'Mechanical Keyboard Keychron K2', 'price' => 1850000, 'category' => 'Aksesoris', 
                'image' => 'https://images.unsplash.com/photo-1595225476474-87563907a212?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
            ],
            [
                'id' => 7, 'name' => 'Motherboard MSI MPG B650 EDGE', 'price' => 4750000, 'category' => 'Motherboard', 
                'image' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
            ],
            [
                'id' => 8, 'name' => 'Power Supply Corsair RM850x 850W', 'price' => 2400000, 'category' => 'PSU', 
                'image' => 'https://images.unsplash.com/photo-1587202372775-e229f172b9d7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
            ],
        ];

        return view('products.index', compact('products'));
    }

    /**
     * Menampilkan detail satu produk berdasarkan slug
     */
    public function show($slug)
    {
        return "Ini adalah Halaman Detail Produk dengan slug: " . $slug;
    }
}