<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Define the predefined categories
        $categories = [
            'men' => 12,
            'women' => 2,
            'kids' => 13,
        ];

        // Manually create a specific product for the 'men' category
        Product::create([
            'name' => 'Men’s Polo Shirt',
            'description' => 'A high-quality men’s polo shirt.',
            'category_id' => $categories['men'], // Using the men category
            'image' => $faker->imageUrl(640, 480, 'fashion', true, 'Men'),
            'mrp_price' => 120.00,
            'selling_price' => 100.00,
        ]);

        // Manually create a specific product for the 'women' category
        Product::create([
            'name' => 'Women’s Dress',
            'description' => 'A beautiful women’s dress for any occasion.',
            'category_id' => $categories['women'], // Using the women category
            'image' => $faker->imageUrl(640, 480, 'fashion', true, 'Women'),
            'mrp_price' => 150.00,
            'selling_price' => 130.00,
        ]);

        // Manually create a specific product for the 'kids' category
        Product::create([
            'name' => 'Kids’ Sneakers',
            'description' => 'Comfortable sneakers for kids.',
            'category_id' => $categories['kids'], // Using the kids category
            'image' => $faker->imageUrl(640, 480, 'fashion', true, 'Kids'),
            'mrp_price' => 80.00,
            'selling_price' => 70.00,
        ]);

        // Generate additional random products with random categories
        for ($i = 1; $i <= 7; $i++) {
            $randomCategory = array_rand($categories);

            Product::create([
                'name' => 'Sample Product ' . $i,
                'description' => 'This is a description for Sample Product ' . $i,
                'category_id' => $categories[$randomCategory], // Assign a random predefined category
                'image' => $faker->imageUrl(640, 480, 'fashion', true, ucfirst($randomCategory)),
                'mrp_price' => rand(50, 200), // Random MRP price between 50 and 200
                'selling_price' => rand(40, 190), // Random selling price between 40 and 190
            ]);
        }
    }
}
