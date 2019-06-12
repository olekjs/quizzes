<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category.index', [
            'categories' => Category::all(),
        ]);
    }

    public function show($name)
    {
        abort_unless($category = Category::whereName($name)->first(), 404);

        return view('category.show', [
            'games'    => $category->games,
            'category' => $category,
        ]);
    }
}
