<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman utama website e-commerce
     */
    public function index()
    {
        // DATA DUMMY PRODUK KOMPUTER (Hanya untuk keperluan Praktikum 4)
        // Di Praktikum 8 nanti, ini akan diganti menjadi $featuredProducts = Product::all();
        $featuredProducts = [
            [
                'id' => 1,
                'name' => 'Laptop ASUS ROG Zephyrus G14 (2024)',
                'price' => 28500000,
                'category' => 'Laptop Gaming',
                'image' => 'https://images.unsplash.com/photo-1603302576837-37561b2e2302?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
            ],
            [
                'id' => 2,
                'name' => 'VGA NVIDIA RTX 4080 Super 16GB',
                'price' => 18900000,
                'category' => 'Graphics Card',
                'image' => 'https://images.unsplash.com/photo-1591488320449-011701bb6704?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
            ],
            [
                'id' => 3,
                'name' => 'RAM Corsair Vengeance RGB 32GB DDR5',
                'price' => 3200000,
                'category' => 'Memory (RAM)',
                'image' => 'https://images.unsplash.com/photo-1541029071515-84cc54f84dc5?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
            ],
            [
                'id' => 4,
                'name' => 'SSD Samsung 990 PRO 2TB NVMe',
                'price' => 2800000,
                'category' => 'Storage',
                'image' => 'https://images.unsplash.com/photo-1597852074816-d933c7d2b988?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
            ],
        ];

        return view('home', compact('featuredProducts'));
    }
}