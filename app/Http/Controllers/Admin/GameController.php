<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Game;

class GameController extends Controller
{
    public function index()
    {
        return view('admin.game.index', [
            'games' => Game::all(),
        ]);
    }

    public function create()
    {
        return view('admin.game.create', [
            'categories' => Category::all(),
        ]);
    }

    public function edit($uniqueCode)
    {
        abort_unless($game = Game::where('unique_code', $uniqueCode)->first(), 404);

        return view('admin.game.edit', [
            'categories' => Category::all(),
            'game'       => $game,
        ]);
    }
}
