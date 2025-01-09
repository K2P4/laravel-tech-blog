<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "category_id" => Category::factory(),
            "user_id" => User::factory(),
            "title" => $this->faker->sentence(),
            "intro" => $this->faker->sentence(),
            "slug" => $this->faker->unique()->slug(),
            "body" => $this->faker->paragraph(),
            'thumbnail' => 'thumbnails/wallpapersden.com_anime-one-piece-hd-monkey-d-luffy-cool_1920x1080.jpg',

        ];
    }
}
