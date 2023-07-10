<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'clientName' => $this->faker->name(),
            'clientPhone' => $this->faker->phoneNumber(),
            'clientCarNumber' => $this->faker->numerify('30 A###SS'),
            'user_id' => User::factory(),
            'product1' => $this->faker->name(),

            'numproduct1' => $this->faker->numberBetween(1000, 4000),
            'numproduct2' => $this->faker->numberBetween(1000, 4000),
            'numproduct3' => $this->faker->numberBetween(1000, 4000),
            'numproduct4' => $this->faker->numberBetween(1000, 4000),

            'total1price' => $this->faker->numberBetween(40000, 50000),
            'total2price' => $this->faker->numberBetween(40000, 50000),
            'total3price' => $this->faker->numberBetween(40000, 50000),
            'total4price' => $this->faker->numberBetween(40000, 50000),

            'publishedBy' => $this->faker->name(),
            'status' => $this->faker->numberBetween(0, 1)
        ];
    }
}