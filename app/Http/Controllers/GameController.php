<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Services\SteamService;
use Illuminate\Http\Request;

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

        return view('games.show', ['game' => $game, 'steamVideoUrl' => $steamVideoUrl]);
    }
    public function create()
    {
        return view('games.create');
    }
    public function store()
    {
        request()->validate([
            'steam_id' => ['required',],
            'title' => ['required'],
        ]);
        $steamData = new SteamService(request('steam_id'));
        Game::create([
            'title' => request('title'),
            'steam_id' => request('steam_id'),
            'image_path' => $steamData->getLocalImgPath(),

        ]);
        dd($steamData->getLocalImgPath());

        return redirect('/games');
    }
    public function edit(Game $game)
    {


        return view('games.edit', ['game' => $game]);
    }
    public function update(Game $game)
    {
        // dd('hey');
        request()->validate([
            'steam_id' => ['required',],
            'title' => ['required'],
        ]);

        $game->update([
            'title' => request('title'),
            'steam_id' => request('steam_id'),


        ]);

        return redirect('/games/' . $game->id);
    }
    public function destroy(Game $game)
    {
        $game->delete();



        return redirect('/games');
    }
}
