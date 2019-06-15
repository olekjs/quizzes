<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Player;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function savePlayer(Request $request)
    {
        $player = Player::create([
            'game_id' => $request->input('game_id'),
            'name'    => $request->input('nickname'),
            'ip'      => $request->ip(),
        ]);

        return $player->id;
    }
}
