<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use App\Models\Review;
use App\Models\Contact;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $categories = [
    [
        'name' => 'Electronics',
        'imagepath' => 'assets/img/electronic.jpg',
        'created_at' => now(),
        'updated_at' => now()
    ],
    [
        'name' => 'Clothing',
        'imagepath' => 'assets/img/a.jpg',
        'created_at' => now(),
        'updated_at' => now()
    ],
    [
        'name' => 'Books',
        'imagepath' => 'assets/img/canon.jpg',
        'created_at' => now(),
        'updated_at' => now()
    ],
    [
        'name' => 'Accessories',
        'imagepath' => 'assets/img/packback.jpg',
        'created_at' => now(),
        'updated_at' => now()
    ],
];


        Category::insert($categories);
        // Create 1 admin
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'role' => 1,
            'password' => bcrypt('password'),
            'avatar' => 'assets/img/avatar2.png'
        ]);

        // Create 10 regular users
        User::factory(10)->create();

        // Create 20 products
        Product::factory(20)->create();

        // Create 30 reviews
        Review::factory(30)->create();

        // Create 15 messages
        Contact::factory(15)->create();
    }
}