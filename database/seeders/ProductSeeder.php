<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      product::create([
        'name'=>'Mens',
        'description'=>'shirts category',
        'image'=>'Image',
      ]) ;
    }
}
