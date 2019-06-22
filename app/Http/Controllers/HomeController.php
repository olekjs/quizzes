<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'games' => Game::inRandomOrder()->take(4)->get(),
            'categories' => Category::all(),
        ]);
    }
}
