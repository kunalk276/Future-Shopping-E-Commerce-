<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create([
            'title' => 'Electronics',
            'image' => 'categories/electronics.jpg'
        ]);

        Category::create([
            'title' => 'Home & Kitchen',
            'image' => 'categories/home_kitchen.jpg'
        ]);

        Category::create([
            'title' => 'Clothing, Shoes & Jewelry',
            'image' => 'categories/clothing_shoes_jewelry.jpg'
        ]);

        Category::create([
            'title' => 'Beauty & Personal Care',
            'image' => 'categories/beauty_personal_care.jpg'
        ]);

        Category::create([
            'title' => 'Books',
            'image' => 'categories/books.jpg'
        ]);

        Category::create([
            'title' => 'Toys & Games',
            'image' => 'categories/toys_games.jpg'
        ]);

        Category::create([
            'title' => 'Sports & Outdoors',
            'image' => 'categories/sports_outdoors.jpg'
        ]);

        Category::create([
            'title' => 'Health & Household',
            'image' => 'categories/health_household.jpg'
        ]);
    }
}
