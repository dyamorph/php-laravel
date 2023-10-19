<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'title' => 'Sample Product 1',
            'description' => 'This is a sample product description.',
            'manufacturer' => 'Sample Manufacturer',
            'release_date' => '2010-10-10',
            'price' => 2200,
            'currency' => 'BYN',
        ]);

        Product::create([
            'title' => 'Sample Product 1',
            'description' => 'This is a sample product description.',
            'manufacturer' => 'Sample Manufacturer',
            'release_date' => '2010-10-10',
            'price' => 1000,
            'currency' => 'BYN',
        ]);

        Product::create([
            'title' => 'Sample Product 1',
            'description' => 'This is a sample product description.',
            'manufacturer' => 'Sample Manufacturer',
            'release_date' => '2010-10-10',
            'price' => 2333,
            'currency' => 'BYN',
        ]);
    }
}
