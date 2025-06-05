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
                'title'            => 'My Website',
                'keyword'          => 'my website, my blog',
                'description'      => 'This is my website',
                'logo'             => '/assets/images/logo/logo.svg',
                'icon'             => '/assets/images/logo/favicon.ico',
                'domain'           => 'naminc.io',
                'author'    => 'NAMINC',
                'maintenance_mode' => 'off',
            ]
        );
        
    }
}
