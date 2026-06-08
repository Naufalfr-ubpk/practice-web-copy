<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Membuat akun admin default untuk FoodLumina.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@foodlumina.com'],
            [
                'name'     => 'Admin FoodLumina',
                'password' => Hash::make('password'),
                'role'     => 'admin',
            ]
        );
    }
}