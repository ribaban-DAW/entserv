<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mago>
 */
class MagoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word(),
            'nivel' => $this->faker->numberBetween(0, 180),
            'escuela' => $this->faker->word(),
            'varita' => $this->faker->word(),
            'mascota' => $this->faker->word(),
        ];
    }
}
