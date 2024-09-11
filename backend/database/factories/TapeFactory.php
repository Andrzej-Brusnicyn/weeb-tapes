<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tape;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tape>
 */
class TapeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'artist' => $this->faker->name,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 5, 400),
            'stock' => $this->faker->numberBetween(1, 999),
        ];
    }
}
