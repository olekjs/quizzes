<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Question;

class Stage extends Model
{
    protected $fillable = [
        'number',
        'seconds',
        'weight',
    ];

    protected $with = [
        'question'
    ];

    public function question()
    {
        return $this->hasOne(Question::class);
    }
}
