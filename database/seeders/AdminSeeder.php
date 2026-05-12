<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Membuat akun admin default untuk TechStore.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@techstore.com'],
            [
                'name'     => 'Admin TechStore',
                'password' => Hash::make('password'),
                'role'     => 'admin',
            ]
        );
    }
}