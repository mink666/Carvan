<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph(10),
            'image' => null, // hoặc $this->faker->imageUrl()
            'date' => $this->faker->date(),
        ];
    }
}