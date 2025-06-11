<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Game;
use Illuminate\Http\Request;
use App\Services\SteamService;

class GameController extends Controller
{
    public function index()
    {
        return view('games.index', ['games' => Game::all()]);
    }
    public function show($id)
    {
        $game = Game::findOrFail($id);
        $steamVideoUrl = new SteamService($game->steam_id)->getGameVideo();
        // $reviewsteam = new SteamService($game->steam_id);
        // $reviewsteam->getReviewScore();

        return view('games.show', ['game' => $game, 'steamVideoUrl' => $steamVideoUrl]);
    }
    public function create()
    {
        $allTags = Tag::all();
        return view('games.create', ['allTags' => $allTags]);
    }
    public function store()
    {
        request()->validate([
            'steam_id' => ['required',],
            'title' => ['required'],

        ]);
        $steamData = new SteamService(request('steam_id'));
        // dd($steamData->reviewScore);
        Game::create([
            'title' => request('title'),
            'steam_id' => request('steam_id'),
            'image_path' => $steamData->getLocalImgPath(),
            'description' => $steamData->description,
            'steam_review_score' => $steamData->reviewScore,

        ]);
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
