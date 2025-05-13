<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InventoryFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->words(3, true),
            'brand' => $this->faker->randomElement(['VinFast', 'Toyota', 'Honda', 'Ford', 'Hyundai']),
            'year' => $this->faker->numberBetween(2015, 2024),
            'price' => $this->faker->numberBetween(300000000, 2000000000), // VND
            'location' => $this->faker->city(),
            'fuel' => $this->faker->randomElement(['Gasoline', 'Diesel', 'Electric']),
            'transmission' => $this->faker->randomElement(['Automatic', 'Manual']),
            'description' => $this->faker->paragraph(3),
            'image' => null, // hoặc để trống, hoặc dùng ảnh mẫu
            'is_active' => true,
            'is_preowned' => false,
        ];
    }
}
