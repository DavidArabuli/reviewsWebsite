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
        $steamID = fake()->randomElement([451020, 890720, 564530]); // 
        $steamService = new SteamService($steamID);
        return [
            'steam_id' => $steamID,
            'title' => fake()->word(),
            'image_path' => $steamService->getLocalImgPath(),

        ];
    }
    public function configure()
    {
        return $this->afterCreating(function (Game $game) {
            // Attach random tags (1 to 3 tags per review)
            $tagIds = Tag::inRandomOrder()->limit(rand(1, 5))->pluck('id');
            $game->tags()->attach($tagIds);
        });
    }
}
