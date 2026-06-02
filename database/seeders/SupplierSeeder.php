<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers = [
            [
                'name' => 'Tech Supplies Inc.',
                'contact_person' => 'John Smith',
                'email' => 'john@techsupplies.com',
                'phone' => '+1-555-0101',
                'address' => '123 Tech Avenue',
                'city' => 'San Francisco',
                'country' => 'USA',
            ],
            [
                'name' => 'Global Electronics Co.',
                'contact_person' => 'Maria Garcia',
                'email' => 'maria@globalelectronics.com',
                'phone' => '+1-555-0102',
                'address' => '456 Electronics Blvd',
                'city' => 'New York',
                'country' => 'USA',
            ],
            [
                'name' => 'Premium Components Ltd.',
                'contact_person' => 'Zhang Wei',
                'email' => 'wei@premiumcomponents.com',
                'phone' => '+86-10-5500-0103',
                'address' => '789 Component Street',
                'city' => 'Shanghai',
                'country' => 'China',
            ],
            [
                'name' => 'Innovative Tech Solutions',
                'contact_person' => 'Emily Johnson',
                'email' => 'emily@innovativetech.com',
                'phone' => '+1-555-0104',
                'address' => '321 Innovation Drive',
                'city' => 'Austin',
                'country' => 'USA',
            ],
            [
                'name' => 'European Tech Distributors',
                'contact_person' => 'Hans Mueller',
                'email' => 'hans@eurotech.com',
                'phone' => '+49-30-5500-0105',
                'address' => '654 Tech Strasse',
                'city' => 'Berlin',
                'country' => 'Germany',
            ],
        ];

        foreach ($suppliers as $supplier) {
            Supplier::create($supplier);
        }
    }
}
