<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Stage;

class Game extends Model
{
    protected $fillable = [
        'unique_code',
        'password',
        'photo_id',
        'title',
    ];

    protected $with = [
        'stages'
    ];

    public function stages()
    {
        return $this->hasMany(Stage::class);
    }
}