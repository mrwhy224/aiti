<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(6);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'excerpt' => $this->faker->paragraph(2),
            'body' => $this->faker->paragraphs(5, true),
            'is_published' => $this->faker->boolean(80), // 80% chance of being true
            'published_at' => now(),
            // user_id will be set in the seeder
        ];
    }
}
