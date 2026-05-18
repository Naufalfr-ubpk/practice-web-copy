<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Buat Kategori Dummy FoodLumina
        $categories = ['Appetizer', 'Main Course', 'Dessert', 'Beverages', 'Asian', 'Fast Food', 'Pasta'];
        $categoryIds = [];
        
        foreach ($categories as $cat) {
            $id = DB::table('categories')->insertGetId([
                'name' => $cat,
                'slug' => Str::slug($cat),
                'description' => 'Kategori menu ' . $cat . ' premium dari FoodLumina',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $categoryIds[$cat] = $id;
        }

        // 2. Buat Produk Dummy FoodLumina
        $products = [
            [
                'name' => 'Wagyu A5 Premium Steak', 
                'price' => 850000, 
                'category' => 'Main Course',  
                'image' => 'https://images.unsplash.com/photo-1558030006-450675393462?auto=format&fit=crop&w=800&q=80'
            ],
            [
                'name' => 'Signature Salmon Sushi', 
                'price' => 320000, 
                'category' => 'Asian',  
                'image' => 'https://images.unsplash.com/photo-1579871494447-9811cf80d66c?auto=format&fit=crop&w=800&q=80'
            ],
            [
                'name' => 'Truffle Mushroom Pasta', 
                'price' => 185000, 
                'category' => 'Pasta',  
                'image' => 'https://images.unsplash.com/photo-1473093295043-cdd812d0e601?auto=format&fit=crop&w=800&q=80'
            ],
            [
                'name' => 'Matcha Tiramisu Dessert', 
                'price' => 95000, 
                'category' => 'Dessert',  
                'image' => 'https://images.unsplash.com/photo-1563729784474-d77dbb933a9e?auto=format&fit=crop&w=800&q=80'
            ],
            [
                'name' => 'Artisan Beef Burger', 
                'price' => 145000, 
                'category' => 'Fast Food',  
                'image' => 'https://images.unsplash.com/photo-1568901346375-23c9450c58cd?auto=format&fit=crop&w=800&q=80'
            ],
            [
                'name' => 'Classic Italian Margherita Pizza', 
                'price' => 120000, 
                'category' => 'Main Course',  
                'image' => 'https://images.unsplash.com/photo-1574071318508-1cdbab80d002?auto=format&fit=crop&w=800&q=80'
            ],
            [
                'name' => 'Middle Eastern Lamb Kebab', 
                'price' => 85000, 
                'category' => 'Fast Food',  
                'image' => 'https://images.unsplash.com/photo-1529006557810-274b9b2fc783?auto=format&fit=crop&w=800&q=80'
            ],
        ];

        foreach ($products as $i => $p) {
            DB::table('products')->insert([
                'category_id' => $categoryIds[$p['category']],
                'name' => $p['name'],
                'slug' => Str::slug($p['name']),
                'sku' => 'FL-' . strtoupper(Str::random(6)),
                'price' => $p['price'],
                'image' => $p['image'],
                'stock' => 50,
                'description' => 'Sajian eksklusif ' . $p['name'] . ' yang disiapkan oleh chef profesional. Menggunakan bahan-bahan premium untuk pengalaman bersantap yang tak terlupakan.',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}