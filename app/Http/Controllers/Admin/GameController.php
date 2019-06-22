<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class GameController extends Controller
{
    public function index()
    {
        return view('admin.game.index', [
            'categories' => Category::all(),
        ]);
    }
}
