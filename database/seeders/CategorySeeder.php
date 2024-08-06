<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Men',
            'description' => 'description for men\'s products',
            'image'=>'Image',
        ]);

        Category::create([
            'name' => 'Women',
            'description' => 'description for women\'s products',
            'image'=>'Image',
        ]);
    }
}
