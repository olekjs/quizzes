<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Answer;

class Question extends Model
{
    protected $fillable = [
        'content',
        'photo_id',
    ];

    protected $with = [
        'answers'
    ];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
