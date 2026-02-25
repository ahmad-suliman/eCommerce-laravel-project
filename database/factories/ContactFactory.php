<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    protected $model = \App\Models\contact::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->numberBetween(1, 100),
            'subject' => $this->faker->words(3, true),
            'message' => $this->faker->sentence(15),
            'user_id' => $this->faker->numberBetween(1, 10),
            'is_read' => $this->faker->boolean(50),
        ];
    }
}