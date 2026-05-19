<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat akun admin default
        User::factory()->create([
            'name' => 'Admin LyfeBillionaire',
            'email' => 'admin@lyfebillionaire.com',
            'password' => bcrypt('password123'),
        ]);
    }
}
