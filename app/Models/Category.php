<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Game;

class Category extends Model
{
    protected $fillable = [
        'name',
        'photo_id'
    ];

    public function games()
    {
        return $this->hasMany(Game::class);
    }
}