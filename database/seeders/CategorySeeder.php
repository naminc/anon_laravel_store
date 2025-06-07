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
            ['name' => 'Electronics', 'description' => 'Devices, gadgets and more.', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Books', 'description' => 'Fiction, non-fiction, educational materials.', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Clothing', 'description' => 'Men and women fashion.', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Home & Kitchen', 'description' => 'Appliances, furniture, cookware.', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sports', 'description' => 'Sportswear, equipment, outdoor gear.', 'created_at' => now(), 'updated_at' => now()],
        ];
        DB::table('categories')->insert($categories);
    }
}
