<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Author;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          'title' => fake()->words(2, true),
          'description' => fake()->sentences(2, true),
          'year' => rand(1, 10000),
          'price' => rand(0, 100),
          'is_published' => rand(0, 1),
          'author_id'=>Author::factory()
        ];
    }
}
