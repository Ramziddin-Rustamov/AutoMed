<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
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
            'car_number' => $this->faker->numerify('30-H###SA'),
            'client_number' => $this->faker->phoneNumber(),
            'status' => $this->faker->numberBetween(0, 1),
            'user_id' => User::all()->random()->id,
            'published_by' => $this->faker->name()
        ];
    }
}