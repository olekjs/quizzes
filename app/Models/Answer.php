<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{

    protected $fillable = [
        'content',
        'type',
        'photo_id',
    ];
}