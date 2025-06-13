<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'fullname' => 'Admin',
            'email' => 'admin@naminc.dev',
            'role' => 'admin',
            'status' => 'active',
            'password' => Hash::make('123456'),
        ]);
    }
}