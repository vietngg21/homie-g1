<?php

namespace Database\Factories;

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
    public function definition()
    {
        return [
            //
            'blog_name' => fake()->realTextBetween(10, 100, 2),
            'blog_description' => fake()->paragraphs(5, true),
            'user_id' => User::factory(),
        ];
    }
}
