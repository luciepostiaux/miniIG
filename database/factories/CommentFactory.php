<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::get()->random()->id,
            'post_id' => \App\Models\Post::get()->random()->id,
            'comment' => fake()->realTextBetween($minNbChars = 20, $maxNbChars = 200),
            'created_at' => fake()->dateTimeBetween('-2 months', 'now'),
        ];
    }
}
