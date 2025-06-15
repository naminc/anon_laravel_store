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
                'icon' => 'admin-assets/images/icons/categories/cloth.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Watches',
                'description' => 'Watches',
                'icon' => 'admin-assets/images/icons/categories/watch.svg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Shoes',
                'description' => 'Shoes',
                'icon' => 'admin-assets/images/icons/categories/shoes.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Shorts',
                'description' => 'Shorts',
                'icon' => 'admin-assets/images/icons/categories/denim-shorts.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'name' => 'Jacket',
                'description' => 'Jacket',
                'icon' => 'admin-assets/images/icons/categories/denim-jacket.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'name' => 'Skirt',
                'description' => 'Skirt',
                'icon' => 'admin-assets/images/icons/categories/skirt.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'name' => 'Sports',
                'description' => 'Sports',
                'icon' => 'admin-assets/images/icons/categories/sport.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'name' => 'Formal',
                'description' => 'Formal',
                'icon' => 'admin-assets/images/icons/categories/suit.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('categories')->insert($categories);
        DB::statement('ALTER TABLE categories AUTO_INCREMENT = 9;');
    }
}