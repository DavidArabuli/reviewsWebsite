<?php

namespace Database\Factories;

use App\Models\Tag;
use App\Models\User;
use App\Models\Author;
use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => fake()->sentence(2),
            'content' => fake()->sentence(5),
            'score' => fake()->numberBetween(1, 10),
        ];
    }
    public function configure()
    {
        return $this->afterCreating(function (Review $review) {
            // Attach random tags (1 to 3 tags per review)
            $tagIds = Tag::inRandomOrder()->limit(rand(1, 5))->pluck('id');
            $review->tags()->attach($tagIds);
        });
    }
}
