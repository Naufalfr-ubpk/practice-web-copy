<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Data Dummy FoodLumina (Updated Images & Translations)
        $featuredProducts = [
            [
                'id' => 1,
                'name_id' => 'Steak Wagyu A5 Premium',
                'name_en' => 'Premium A5 Wagyu Steak',
                'slug' => 'wagyu-a5-premium',
                'price' => 850000,
                'image' => 'https://images.unsplash.com/photo-1600891964092-4316c288032e?auto=format&fit=crop&w=800&q=80',
                'category_id' => 'Hidangan Utama',
                'category_en' => 'Main Course'
            ],
            [
                'id' => 2,
                'name_id' => 'Sushi Salmon Pilihan',
                'name_en' => 'Signature Salmon Sushi',
                'slug' => 'signature-salmon-sushi',
                'price' => 320000,
                'image' => 'https://images.unsplash.com/photo-1579871494447-9811cf80d66c?auto=format&fit=crop&w=800&q=80',
                'category_id' => 'Menu Asia',
                'category_en' => 'Asian Menu'
            ],
            [
                'id' => 3,
                'name_id' => 'Pasta Jamur Truffle',
                'name_en' => 'Truffle Mushroom Pasta',
                'slug' => 'truffle-mushroom-pasta',
                'price' => 185000,
                'image' => 'https://images.unsplash.com/photo-1473093295043-cdd812d0e601?auto=format&fit=crop&w=800&q=80',
                'category_id' => 'Pasta',
                'category_en' => 'Pasta'
            ],
            [
                'id' => 4,
                'name_id' => 'Dessert Tiramisu Matcha',
                'name_en' => 'Matcha Tiramisu Dessert',
                'slug' => 'matcha-tiramisu',
                'price' => 95000,
                'image' => 'https://images.unsplash.com/photo-1563729784474-d77dbb933a9e?auto=format&fit=crop&w=800&q=80',
                'category_id' => 'Hidangan Penutup',
                'category_en' => 'Dessert'
            ],
            [
                'id' => 5,
                'name_id' => 'Burger Daging Artisan',
                'name_en' => 'Artisan Beef Burger',
                'slug' => 'artisan-beef-burger',
                'price' => 145000,
                'image' => 'https://images.unsplash.com/photo-1568901346375-23c9450c58cd?auto=format&fit=crop&w=800&q=80',
                'category_id' => 'Cepat Saji',
                'category_en' => 'Fast Food'
            ],
        ];

        return view('home', compact('featuredProducts'));
    }
}