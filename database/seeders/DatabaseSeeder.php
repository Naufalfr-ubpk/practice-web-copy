<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Memanggil seeder khusus yang udah kita bikin
        $this->call([
            AdminSeeder::class,
            ProductSeeder::class,
        ]);
    }
}