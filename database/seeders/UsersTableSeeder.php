<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Clear existing records in the users table
        // DB::table('users')->truncate();

        // Seed data for the users table
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'status' => 'active',
                'role' => 'admin',
                'is_online' => 'true',
            ]
            // Add more users as needed

        ];

        // Insert the data into the users table
        foreach ($users as $user) {
            User::create($user);
        }
    }
}