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
        return view('games.show', ['game' => Game::findOrFail($id)]);
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
}
