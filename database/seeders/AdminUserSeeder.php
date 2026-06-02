<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::firstOrCreate(
            ['email' => 'kozzefrank@gmail.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('1234567890'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );
    }
}
