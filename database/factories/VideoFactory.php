<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->words(nb: 2, asText: true),
            'description' => fake()->sentences(nb: 2, asText: true),
            'year' => rand(min: 1, max: 10000),
            'price' => rand(min: 0, max: 100),
            'is_published' => rand(min: 0, max: 1)
        ];
    }
}
