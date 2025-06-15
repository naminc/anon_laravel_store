<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->truncate();
        DB::statement('ALTER TABLE settings AUTO_INCREMENT = 1;');
        Setting::updateOrCreate(
            ['id' => 1],
            [
                'title'            => 'My Laravel Ecommerce Website',
                'keyword'          => 'my website, my ecommerce , my laravel website',
                'description'      => 'This is my ecommerce website',
                'logo'             => '/assets/images/logo/logo.svg',
                'icon'             => '/assets/images/logo/favicon.ico',
                'domain'           => 'naminc.io',
                'author'           => 'naminc',
                'phone'            => '0347101143',
                'email'            => 'admin@naminc.dev',
                'address'          => '313 Street 19, Hiep Binh Chanh, Thu Duc, Ho Chi Minh City, Vietnam',
                'maintenance_mode' => 'off',
                'created_at'       => now(),
                'updated_at'       => now(),
            ]
        );
    }
}