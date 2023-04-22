<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'qr_code' => $this->faker->randomNumber(6, true),
            'numbers' => $this->faker->numerify(),
            'coming_cost' => $this->faker->bothify('######'),
            'selling_cost' => $this->faker->bothify('#######'),
            'profit' => $this->faker->bothify('######'),
        ];
    }
}