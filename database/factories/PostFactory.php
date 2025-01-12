<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Kategori;
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
        return [
            'title' => $this->faker->sentence(rand(1, 5), false),
            'author_id' => User::factory(),
            'kategori_id' => Kategori::factory(),
            'slug' => $this->faker->slug,
            'text' => $this->faker->text(rand(200, 500)),
        ];
    }
}
