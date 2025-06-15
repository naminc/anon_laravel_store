<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'id' => 1,
                'name' => 'Shirt',
                'description' => 'Shirt',
                'icon' => 'storage/uploads/categories/1749990095_cloth.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Watches',
                'description' => 'Watches',
                'icon' => 'storage/uploads/categories/1749989740_watch.svg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Shoes',
                'description' => 'Shoes',
                'icon' => 'storage/uploads/categories/1749990031_shoes.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Shorts',
                'description' => 'Shorts',
                'icon' => 'storage/uploads/categories/1749990689_denim-shorts.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'name' => 'Jacket',
                'description' => 'Jacket',
                'icon' => 'storage/uploads/categories/1749990722_denim-jacket.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'name' => 'Skirt',
                'description' => 'Skirt',
                'icon' => 'storage/uploads/categories/1749990143_skirt.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'name' => 'Sports',
                'description' => 'Sports',
                'icon' => 'storage/uploads/categories/1749990222_sport.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'name' => 'Formal',
                'description' => 'Formal',
                'icon' => 'storage/uploads/categories/1749990247_suit.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('categories')->insert($categories);
        DB::statement('ALTER TABLE categories AUTO_INCREMENT = 9;');
    }
}