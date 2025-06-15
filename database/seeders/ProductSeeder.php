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
                'images' => 'storage/uploads/products/1749629557_jacket-1.jpg',
                'category_id' => 1,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('products')->insert($products);
    }
}