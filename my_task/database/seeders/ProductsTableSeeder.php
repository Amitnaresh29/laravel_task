<?php

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();

        $products = [
            [
                'name' => 'iPhone 12 Pro Max',
                'description' => 'The latest iPhone with advanced camera features.',
                'price' => 1179,
                'category' => 'Electronics',
                'brand' => 'Apple'
            ],
            [
                'name' => 'Samsung Galaxy S21 Ultra',
                'description' => 'A flagship phone with a large display and powerful camera.',
                'price' => 1199,
                'category' => 'Electronics',
                'brand' => 'Samsung'
            ],
            [
                'name' => 'MacBook Air M1',
                'description' => 'The latest MacBook Air with Apple Silicon.',
                'price' => 999,
                'category' => 'Electronics',
                'brand' => 'Apple'
            ],
            [
                'name' => 'Nike Air Max 270',
                'description' => 'Comfortable sneakers for everyday wear.',
                'price' => 130,
                'category' => 'Clothing',
                'brand' => 'Nike'
            ],
            [
                'name' => 'Adidas Ultraboost',
                'description' => 'Performance running shoes with a comfortable fit.',
                'price' => 180,
                'category' => 'Clothing',
                'brand' => 'Adidas'
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
