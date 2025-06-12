<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Game;
use Illuminate\Http\Request;
use App\Services\SteamService;
use Illuminate\Pagination\LengthAwarePaginator;

class GameController extends Controller
{
    public function index()
    {
        return view('games.index', ['games' => Game::all()]);
    }
    public function show($id)
    {
        $game = Game::findOrFail($id);
        $steamData = new SteamService($game->steam_id);
        $steamVideoUrl = $steamData->getGameVideo();
        $screenshotsArray = $steamData->screenshotsArray;
        // $reviewsteam = new SteamService($game->steam_id);
        // $reviewsteam->getReviewScore();

        return view('games.show', ['game' => $game, 'steamVideoUrl' => $steamVideoUrl, "screenshotsArray" => $screenshotsArray]);
    }
    // public function show($id)
    // {
    //     $game = Game::findOrFail($id);
    //     $steamData = new SteamService($game->steam_id);
    //     $steamVideoUrl = $steamData->getGameVideo();

    //     $screenshots = $steamData->screenshotsArray;


    //     $currentPage = request()->get('page', 1);
    //     $perPage = 3;


    //     $pagedScreenshots = new LengthAwarePaginator(
    //         array_slice($screenshots, ($currentPage - 1) * $perPage, $perPage),
    //         count($screenshots),
    //         $perPage,
    //         $currentPage,
    //         ['path' => request()->url(), 'query' => request()->query()]
    //     );

    //     return view('games.show', [
    //         'game' => $game,
    //         'steamVideoUrl' => $steamVideoUrl,
    //         'screenshots' => $pagedScreenshots
    //     ]);
    // }
    public function create()
    {
        $allTags = Tag::all();
        return view('games.create', ['allTags' => $allTags]);
    }
    public function store()
    {
        $data = request()->validate([
            'steam_id' => ['required',],
            'title' => ['required'],
            'tags' => 'array',
            'tags.*' => 'exists:tags,id',

        ]);
        $steamData = new SteamService(request('steam_id'));
        // dd($steamData->reviewScore);
        $game = Game::create([
            'title' => request('title'),
            'steam_id' => request('steam_id'),
            'image_path' => $steamData->getLocalImgPath(),
            'description' => $steamData->description,
            'steam_review_score' => $steamData->reviewScore,

        ]);
        $game->tags()->sync($data['tags'] ?? []);
        // dd($steamData->getLocalImgPath());

        return redirect('/games');
    }
    public function edit(Game $game)
    {
        $allTags = Tag::all();

        return view('games.edit', ['game' => $game, 'allTags' => $allTags]);
    }
    public function update(Game $game)
    {
        // dd('hey');
        $data = request()->validate([
            'steam_id' => ['required',],
            'title' => ['required'],
            'tags' => 'array',
            'tags.*' => 'exists:tags,id',
        ]);

        $game->update([
            'title' => request('title'),
            'steam_id' => request('steam_id'),


        ]);
        $game->tags()->sync($data['tags'] ?? []);

        return redirect('/games/' . $game->id);
    }
    public function destroy(Game $game)
    {
        $game->delete();



        return redirect('/games');
    }
}
