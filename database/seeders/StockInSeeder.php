<?php

namespace Database\Seeders;

use App\Models\StockIn;
use Illuminate\Database\Seeder;

class StockInSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stockIns = [
            [
                'product_id' => 1,
                'supplier_id' => 1,
                'quantity' => 10,
                'unit_price' => 899.99,
                'notes' => 'Initial stock',
            ],
            [
                'product_id' => 2,
                'supplier_id' => 2,
                'quantity' => 8,
                'unit_price' => 1299.99,
                'notes' => 'First shipment',
            ],
            [
                'product_id' => 3,
                'supplier_id' => 1,
                'quantity' => 50,
                'unit_price' => 29.99,
                'notes' => 'Bulk order',
            ],
            [
                'product_id' => 4,
                'supplier_id' => 3,
                'quantity' => 100,
                'unit_price' => 12.99,
                'notes' => 'Standard supply',
            ],
            [
                'product_id' => 5,
                'supplier_id' => 2,
                'quantity' => 25,
                'unit_price' => 149.99,
                'notes' => 'Gaming equipment order',
            ],
            [
                'product_id' => 6,
                'supplier_id' => 4,
                'quantity' => 5,
                'unit_price' => 399.99,
                'notes' => 'Premium monitors',
            ],
            [
                'product_id' => 7,
                'supplier_id' => 1,
                'quantity' => 15,
                'unit_price' => 79.99,
                'notes' => 'Video equipment',
            ],
            [
                'product_id' => 8,
                'supplier_id' => 3,
                'quantity' => 10,
                'unit_price' => 129.99,
                'notes' => 'Storage devices',
            ],
            [
                'product_id' => 9,
                'supplier_id' => 5,
                'quantity' => 20,
                'unit_price' => 199.99,
                'notes' => 'Audio equipment',
            ],
            [
                'product_id' => 10,
                'supplier_id' => 1,
                'quantity' => 40,
                'unit_price' => 19.99,
                'notes' => 'Phone accessories',
            ],
        ];

        foreach ($stockIns as $stockIn) {
            StockIn::create($stockIn);
        }
    }
}
