<?php

namespace Database\Factories;

use App\Models\President;
use Illuminate\Database\Eloquent\Factories\Factory;

class PresidentFactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "president_id" => President::factory(),
            "fact" => $this->faker->sentence(),
        ];
    }
}
