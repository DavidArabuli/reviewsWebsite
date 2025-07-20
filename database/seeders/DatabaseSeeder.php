<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Game;
use App\Models\User;
use App\Models\Review;
use App\Services\SteamService;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        Tag::factory(5)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);


        $steamIDs = [451020, 890720, 564530, 2161700, 553850, 2277560];


        $games = collect();

        foreach ($steamIDs as $steamID) {
            $steamService = new SteamService($steamID);

            $game = Game::factory()->create([
                'steam_id' => $steamID,
                'image_path' => $steamService->getLocalImgPath(),
            ]);

            $games->push($game);
        }

        Review::factory(6)->create([
            'game_id' => fn() => $games->random()->id,
        ]);
    }
}
