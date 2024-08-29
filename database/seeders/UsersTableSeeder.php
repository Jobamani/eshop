<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
     * Run the database seeds.
     *
     * @return void
     */
    
    
        // Create an admin user
        // User::create([
        //     'name' => 'Admin User',
        //     'email' => 'admin@example.com',
        //     'phone_no' => '1234567890',
        //     'gender' => 'male',
        //     'suspended' => 0, // Not suspended
        //     'status' => 'active',
        //     'password' => Hash::make('password'), // Hashed password
        //     'image' => null, // You can set a default image path if required
        // ]);

        // Create multiple random users using a loop
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => 'User ' . $i,
                'email' => 'user' . $i . '@example.com',
                'phone_no' => '123456789' . $i,
                'gender' => $i % 2 == 0 ? 'male' : 'female',
                'suspended' => 0, // Not suspended
                'status' => 'active',
                'password' => Hash::make('password'),
                'image' => null, // You can set a default image path if required
            ]);
        }
    
    }
}
