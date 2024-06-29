<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\President>
 */
class PresidentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->name(),
            "birth_date" => $this->faker->date(),
            "death_date" => $this->faker->date(),
            "party" => $this->faker->name(),
            "term_start_year" => $this->faker->year(),
            "term_end_year" => $this->faker->year(),
        ];
    }
}
