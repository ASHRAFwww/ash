<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Delivery>
 */
class DeliveryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'address' => fake()->address(),
            'email' => fake()->email(),
            'password' => fake()->password(),
            'date' => fake()->date(),
            'img' => fake()->image(),
            'salary' => fake()->numberBetween('1000' , '10000'),
        ];
    }
}
