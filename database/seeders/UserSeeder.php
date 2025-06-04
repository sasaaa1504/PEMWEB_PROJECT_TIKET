<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
{
    // Hapus dulu user dengan email sama supaya tidak duplikat
    \App\Models\User::where('email', 'admin@hittix.com')->delete();

    // Insert user admin
    \App\Models\User::create([
        'name' => 'Admin HitTix',
        'email' => 'admin@hittix.com',
        'password' => bcrypt('password123'),
        'role' => 'admin',
    ]);
}

}
