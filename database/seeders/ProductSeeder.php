<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Product;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::truncate(); // يمسح القديم باش ما يتكرروش

        Product::insert([
            [
                'name' => 'Wireless Mouse',
                'category' => 'Electronics',
                'price' => 129.99,
                'image' => null,
                'description' => 'Smooth wireless mouse with ergonomic design.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mechanical Keyboard',
                'category' => 'Electronics',
                'price' => 399.00,
                'image' => null,
                'description' => 'Tactile mechanical keyboard for fast typing.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Basic T-Shirt',
                'category' => 'Clothes',
                'price' => 79.00,
                'image' => null,
                'description' => 'Comfortable cotton t-shirt.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hoodie',
                'category' => 'Clothes',
                'price' => 199.00,
                'image' => null,
                'description' => 'Warm hoodie for daily wear.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Notebook A5',
                'category' => 'Stationery',
                'price' => 25.50,
                'image' => null,
                'description' => 'A5 notebook with 120 pages.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Water Bottle 1L',
                'category' => 'Home',
                'price' => 45.00,
                'image' => null,
                'description' => 'Reusable water bottle 1L.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Phone Case',
                'category' => 'Accessories',
                'price' => 59.00,
                'image' => null,
                'description' => 'Shockproof phone case.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bluetooth Speaker',
                'category' => 'Electronics',
                'price' => 249.00,
                'image' => null,
                'description' => 'Portable speaker with clear sound.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Backpack',
                'category' => 'Accessories',
                'price' => 179.00,
                'image' => null,
                'description' => 'Simple backpack for school and travel.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Desk Lamp',
                'category' => 'Home',
                'price' => 110.00,
                'image' => null,
                'description' => 'LED desk lamp with adjustable arm.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
