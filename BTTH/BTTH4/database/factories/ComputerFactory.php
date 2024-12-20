<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Computer>
 */
class ComputerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'computer_name' => $this->faker->unique()->word . '-PC' . $this->faker->numberBetween(1, 99),
            'model' => $this->faker->randomElement(['Dell Optiplex 7090', 'HP EliteBook 840', 'Lenovo ThinkPad X1']),
            'operating_system' => $this->faker->randomElement(['Windows 10 Pro', 'Ubuntu 20.04', 'macOS Ventura']),
            'processor' => $this->faker->randomElement(['Intel Core i5-11400', 'AMD Ryzen 7 5800H', 'Apple M1']),
            'memory' => $this->faker->randomElement([8, 16, 32]), 
            'available' => $this->faker->boolean, 
        ];
    }
}
