<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // User modelini dahil et

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Eğer bir admin yoksa oluştur
        User::firstOrCreate(
            ['email' => 'admin@example.com'], // Emaili kullanarak kontrol et
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'), // Şifreyi hashle
                'role' => 'admin' // Admin rolünü ata
            ]
        );
    }
}
