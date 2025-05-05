<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'fullname' => 'Ngo Dinh Nam',
            'username' => 'naminc',
            'email' => 'admin@naminc.dev',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
            'status' => 'active',
        ]);
    }
}
