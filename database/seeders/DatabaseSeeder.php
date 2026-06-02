<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@inventory.com',
        ]);

        // Create kozzefrank user with specified password
        User::create([
            'name' => 'Kozze Frank',
            'email' => 'kozzefrank@gmail.com',
            'password' => Hash::make('1234567890'),
        ]);

        // Create additional test users
        User::factory(5)->create();

        // Seed master data
        $this->call([
            ProductSeeder::class,
            SupplierSeeder::class,
            StockInSeeder::class,
            StockOutSeeder::class,
        ]);
    }
}

