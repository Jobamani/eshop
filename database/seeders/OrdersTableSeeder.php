<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\User;
use Faker\Factory as Faker;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
            
        // Create 10 orders with random data
        foreach (range(1, 10) as $index) {
            Order::create([
                'user_id' => User::inRandomOrder()->first()->id, // Assign a random user
                'order_number' => $faker->unique()->numerify('ORD###'),
                'total_amount' => $faker->randomFloat(2, 50, 500), // Random total amount between 50 and 500
            ]);
        }
    }
}
