<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Laptop',
                'category' => 'Electronics',
                'description' => 'High-performance laptop for business',
                'quantity' => 15,
                'unit_price' => 899.99,
            ],
            [
                'name' => 'Desktop Computer',
                'category' => 'Electronics',
                'description' => 'Powerful desktop for gaming and work',
                'quantity' => 8,
                'unit_price' => 1299.99,
            ],
            [
                'name' => 'Wireless Mouse',
                'category' => 'Accessories',
                'description' => 'Ergonomic wireless mouse',
                'quantity' => 45,
                'unit_price' => 29.99,
            ],
            [
                'name' => 'USB-C Cable',
                'category' => 'Accessories',
                'description' => '3m USB-C charging cable',
                'quantity' => 2,
                'unit_price' => 12.99,
            ],
            [
                'name' => 'Mechanical Keyboard',
                'category' => 'Accessories',
                'description' => 'RGB mechanical gaming keyboard',
                'quantity' => 22,
                'unit_price' => 149.99,
            ],
            [
                'name' => 'Monitor 27 inch',
                'category' => 'Electronics',
                'description' => '4K UHD monitor',
                'quantity' => 5,
                'unit_price' => 399.99,
            ],
            [
                'name' => 'Webcam HD',
                'category' => 'Accessories',
                'description' => '1080p HD webcam',
                'quantity' => 12,
                'unit_price' => 79.99,
            ],
            [
                'name' => 'External SSD 1TB',
                'category' => 'Electronics',
                'description' => 'Portable 1TB external SSD',
                'quantity' => 3,
                'unit_price' => 129.99,
            ],
            [
                'name' => 'Headphones Wireless',
                'category' => 'Accessories',
                'description' => 'Noise-cancelling wireless headphones',
                'quantity' => 18,
                'unit_price' => 199.99,
            ],
            [
                'name' => 'Phone Stand',
                'category' => 'Accessories',
                'description' => 'Adjustable phone stand',
                'quantity' => 35,
                'unit_price' => 19.99,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
