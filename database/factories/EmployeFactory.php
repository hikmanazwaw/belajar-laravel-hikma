<?php

namespace Database\Factories;

use App\Models\Employe;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Employe>
 */
class EmployeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()->firstName(),
            'alamat' => fake()->address(),
            'gender' => fake()->randomElement(['L', 'P']),
            'gaji' => fake()->numberBetween(3500000, 15000000),
        ];
    }
}
