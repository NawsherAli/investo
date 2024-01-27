<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\User;

class UsersTableSeeder extends Seeder
{
     public function run()
    {
        // Seed the users table
        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'contact' => '1234567890',
            'password' => Hash::make('password'),
            'status' => 'active',
            'role' => 'admin',
            'is_online' => 'true',
            'profile_image' => 'no-profile.png',
            'referal_code' => Str::random(8),
            'refer_by' => null,
            'total_balance' => null,
            'current_balance' => null,
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // You can add more seed data as needed
    }
}