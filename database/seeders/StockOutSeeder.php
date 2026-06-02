<?php

namespace Database\Seeders;

use App\Models\StockOut;
use Illuminate\Database\Seeder;

class StockOutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stockOuts = [
            [
                'product_id' => 1,
                'quantity' => 2,
                'reason' => 'Sale',
                'notes' => 'Sold to customer',
            ],
            [
                'product_id' => 3,
                'quantity' => 5,
                'reason' => 'Sale',
                'notes' => 'Online order',
            ],
            [
                'product_id' => 4,
                'quantity' => 10,
                'reason' => 'Sale',
                'notes' => 'Bulk sale',
            ],
            [
                'product_id' => 5,
                'quantity' => 3,
                'reason' => 'Sale',
                'notes' => 'Store purchase',
            ],
            [
                'product_id' => 7,
                'quantity' => 2,
                'reason' => 'Damage',
                'notes' => 'Defective units',
            ],
            [
                'product_id' => 9,
                'quantity' => 1,
                'reason' => 'Return',
                'notes' => 'Customer return',
            ],
            [
                'product_id' => 10,
                'quantity' => 3,
                'reason' => 'Sale',
                'notes' => 'Retail sale',
            ],
            [
                'product_id' => 2,
                'quantity' => 1,
                'reason' => 'Loss',
                'notes' => 'Inventory discrepancy',
            ],
        ];

        foreach ($stockOuts as $stockOut) {
            StockOut::create($stockOut);
        }
    }
}
