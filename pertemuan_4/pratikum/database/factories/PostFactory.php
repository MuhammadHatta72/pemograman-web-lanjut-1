<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->title();
        $slug = $this->faker->slug();
        return [
            'title' => $title,
            'slug' => $slug,
            'content' => $this->faker->realText(),
            'draft' => random_int(0, 1),
        ];
    }
}
