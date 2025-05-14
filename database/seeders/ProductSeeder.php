<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Electronics (category_id = 1)
        Product::create([
            'title' => 'Wireless Bluetooth Earbuds',
            'image' => 'products/earbuds.jpg',
            'about' => 'Compact noise-cancelling wireless earbuds with long battery life.',
            'price' => 2999,
            'stock_quantity' => 50,
            'discount' => 10,
            'category_id' => 1
        ]);

        Product::create([
            'title' => 'Smart LED TV 50"',
            'image' => 'products/smart_tv.jpg',
            'about' => '50-inch 4K Ultra HD Smart LED TV with streaming apps built-in.',
            'price' => 39999,
            'stock_quantity' => 20,
            'discount' => 15,
            'category_id' => 1
        ]);

        Product::create([
            'title' => 'Portable Power Bank 10000mAh',
            'image' => 'products/power_bank.jpg',
            'about' => 'Fast-charging USB power bank for phones and gadgets.',
            'price' => 1299,
            'stock_quantity' => 100,
            'discount' => 5,
            'category_id' => 1
        ]);

        // Home & Kitchen (category_id = 2)
        Product::create([
            'title' => 'Non-Stick Cookware Set',
            'image' => 'products/cookware_set.jpg',
            'about' => 'Durable non-stick cookware set with 5 essential pieces.',
            'price' => 2499,
            'stock_quantity' => 35,
            'discount' => 20,
            'category_id' => 2
        ]);

        Product::create([
            'title' => 'Electric Kettle 1.5L',
            'image' => 'products/kettle.jpg',
            'about' => 'Stainless steel electric kettle with auto shut-off feature.',
            'price' => 899,
            'stock_quantity' => 40,
            'discount' => 10,
            'category_id' => 2
        ]);

        Product::create([
            'title' => 'Vacuum Cleaner',
            'image' => 'products/vacuum_cleaner.jpg',
            'about' => 'Lightweight and powerful vacuum cleaner with HEPA filter.',
            'price' => 3499,
            'stock_quantity' => 15,
            'discount' => 12,
            'category_id' => 2
        ]);

        // Clothing, Shoes & Jewelry (category_id = 3)
        Product::create([
            'title' => 'Men’s Casual Sneakers',
            'image' => 'products/sneakers.jpg',
            'about' => 'Comfortable sneakers suitable for daily wear and travel.',
            'price' => 1799,
            'stock_quantity' => 60,
            'discount' => 18,
            'category_id' => 3
        ]);

        Product::create([
            'title' => 'Women’s Gold Plated Necklace',
            'image' => 'products/necklace.jpg',
            'about' => 'Elegant gold-plated necklace with heart pendant.',
            'price' => 1299,
            'stock_quantity' => 45,
            'discount' => 25,
            'category_id' => 3
        ]);

        Product::create([
            'title' => 'Unisex Hoodie',
            'image' => 'products/hoodie.jpg',
            'about' => 'Soft fleece hoodie available in various colors.',
            'price' => 999,
            'stock_quantity' => 75,
            'discount' => 10,
            'category_id' => 3
        ]);

        // Beauty & Personal Care (category_id = 4)
        Product::create([
            'title' => 'Face Wash - Herbal',
            'image' => 'products/face_wash.jpg',
            'about' => 'Gentle herbal face wash for clear and glowing skin.',
            'price' => 499,
            'stock_quantity' => 80,
            'discount' => 5,
            'category_id' => 4
        ]);

        Product::create([
            'title' => 'Hair Dryer 2000W',
            'image' => 'products/hair_dryer.jpg',
            'about' => 'Quick dry hair dryer with heat control settings.',
            'price' => 1499,
            'stock_quantity' => 25,
            'discount' => 15,
            'category_id' => 4
        ]);

        Product::create([
            'title' => 'Aloe Vera Body Lotion',
            'image' => 'products/body_lotion.jpg',
            'about' => 'Moisturizing body lotion with aloe vera extract.',
            'price' => 699,
            'stock_quantity' => 90,
            'discount' => 10,
            'category_id' => 4
        ]);
    }
}
