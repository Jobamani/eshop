<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\OrderDetail;


class OrderDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Seed each order with random order details
        foreach (Order::all() as $order) {
            foreach (range(1, rand(1, 5)) as $index) {
                OrderDetail::create([
                    'order_id' => $order->id, // Associate with the current order
                    'product_id' => Product::inRandomOrder()->first()->id, // Assign a random product
                    'quantity' => rand(1, 5), // Random quantity between 1 and 5
                    'price' => $faker->randomFloat(2, 10, 100), // Random price between 10 and 100
                ]);
            }
        }
    } 
           
        
    }

