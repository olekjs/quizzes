<?php

namespace App\Http\Controllers;

use App\Models\Game;

class GameController extends Controller
{
    public function index($uniqueCode)
    {
        abort_unless($game = Game::whereUniqueCode($uniqueCode)->first(), 404);

        return view('game.index', [
            'game'   => $game,
        ]);
    }
}
