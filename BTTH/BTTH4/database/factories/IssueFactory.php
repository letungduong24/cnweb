<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Issue>
 */
class IssueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'computer_id' => $this->faker->numberBetween(1,50),
            'reported_by' => $this->faker->name(), 
            'reported_date' => $this->faker->dateTimeBetween('-1 month', 'now'), 
            'description' => $this->faker->sentence(10), 
            'urgency' => $this->faker->randomElement(['Low', 'Medium', 'High']), 
            'status' => $this->faker->randomElement(['Open', 'In Progress', 'Resolved']), 
        ];
    }
}
