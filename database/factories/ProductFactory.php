<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = \App\Models\Product::class;

    public function definition()
    {
         $images = [
        'assets/img/canon.jpg',
        'assets/img/camera.jpg',
        'assets/img/packback.jpg',
        'assets/img/sony.jpg',
        'assets/img/food.jpg'
    ];
        return [
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->sentence(10),
           'imagepath' => $this->faker->randomElement($images),
            'price' => $this->faker->randomFloat(2, 10, 500),
            'quantity' => $this->faker->numberBetween(1, 100),
            'category_id' => $this->faker->numberBetween(1, 2), // adjust based on your categories
        ];
    }
}