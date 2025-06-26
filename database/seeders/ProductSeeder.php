<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'id' => 1,
                'name' => 'Mens Winter Leathers Jackets',
                'description' => 'Mens Winter Leathers Jackets',
                'price' => 48,
                'images' => 'assets/images/products/jacket-1.jpg',
                'category_id' => 5,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'MEN Yarn Fleece Full-Zip Jacket',
                'description' => 'MEN Yarn Fleece Full-Zip Jacket',
                'price' => 36,
                'images' => 'assets/images/products/jacket-4.jpg',
                'category_id' => 5,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Pure Garment Dyed Cotton Shirt',
                'description' => 'Pure Garment Dyed Cotton Shirt',
                'price' => 24,
                'images' => 'assets/images/products/jacket-6.jpg',
                'category_id' => 1,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Pocket Watch Leather Pouch',
                'description' => 'Pocket Watch Leather Pouch',
                'price' => 12,
                'images' => 'assets/images/products/watch-4.jpg',
                'category_id' => 2,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'name' => 'Better Basics French Terry Sweatshorts',
                'description' => 'Better Basics French Terry Sweatshorts',
                'price' => 24,
                'images' => 'assets/images/products/shorts-2.jpg',
                'category_id' => 4,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'name' => 'Black Floral Wrap Midi Skirt',
                'description' => 'Black Floral Wrap Midi Skirt',
                'price' => 41,
                'images' => 'assets/images/products/clothes-3.jpg',
                'category_id' => 6,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'name' => 'Trekking & Running Shoes - black',
                'description' => 'Trekking & Running Shoes - black',
                'price' => 48,
                'images' => 'assets/images/products/sports-2.jpg',
                'category_id' => 7,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'name' => 'Men\'s Leather Formal Wear shoes',
                'description' => 'Men\'s Leather Formal Wear shoes',
                'price' => 43,
                'images' => 'assets/images/products/shoe-1.jpg',
                'category_id' => 8,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'name' => 'Womens Party Wear Shoes',
                'description' => 'Womens Party Wear Shoes',
                'price' => 32,
                'images' => 'assets/images/products/party-wear-2.jpg',
                'category_id' => 3,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 10,
                'name' => 'Casual Men\'s Brown shoes',
                'description' => 'Casual Men\'s Brown shoes',
                'price' => 43,
                'images' => 'assets/images/products/shoe-2_1.jpg',
                'category_id' => 3,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 11,
                'name' => 'Smart watche Vital Plus',
                'description' => 'Smart watche Vital Plus',
                'price' => 43,
                'images' => 'assets/images/products/watch-2.jpg',
                'category_id' => 2,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 12,
                'name' => 'Mens Winter Leathers Jackets',
                'description' => 'Mens Winter Leathers Jackets',
                'price' => 12,
                'images' => 'assets/images/products/jacket-2.jpg',
                'category_id' => 5,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('products')->insert($products);
    }
}