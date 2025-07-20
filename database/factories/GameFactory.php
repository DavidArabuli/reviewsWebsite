<?php

namespace Database\Factories;

use App\Models\Tag;
use App\Models\Game;
use App\Services\SteamService;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'steam_id' => null,
            'title' => fake()->word(),
            'image_path' => null,
            'steam_review_score' => fake()->randomElement([
                'mostly_positive',
                'very_positive',
                'mostly_negative'
            ]),
            'description' => fake()->sentence(100),
        ];
    }
    public function configure()
    {
        return $this->afterCreating(function (Game $game) {

            $tagIds = Tag::inRandomOrder()->limit(rand(1, 5))->pluck('id');
            $game->tags()->attach($tagIds);
        });
    }
}
