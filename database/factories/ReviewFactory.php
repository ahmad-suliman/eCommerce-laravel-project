<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    protected $model = \App\Models\Review::class;

    public function definition()
    {
        return [
            'name' => $this->faker->words(3, true),
            'phone' => $this->faker->numberBetween(1, 100),
            'email' => $this->faker->unique()->safeEmail(),
            'subject' => $this->faker->words(3, true),
            'message' => $this->faker->sentence(15),
             'user_id' => $this->faker->numberBetween(1, 10),
            
        ];
    }
}