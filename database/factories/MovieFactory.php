<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $letter = chr(rand(65, 90));
        $number = rand(0, 9);
        return [
            'name' => fake()->name(),
            'code' => $letter . $number,
            'type' => rand(0,9),
            'start_date' => fake()->dateTime('now'),
            'end_date' => fake()->dateTime('now'),
            'actors' => fake()->name(),
            'director' => fake()->name(),
            'age_limit' => rand(0,9),
            'description' => fake()->text(),
            'video_duration' => '120',
        ];
    }
}
