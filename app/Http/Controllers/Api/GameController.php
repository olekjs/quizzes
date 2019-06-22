<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

    public function create(Request $request)
    {
        $category = Category::find($request->input('settings.category'));

        $game = $category->games()->create([
            'unique_code' => Str::random(8),
            'password'    => $request->input('settings.password'),
            'title'       => $request->input('settings.title'),
        ]);

        foreach ($request->input('stages') as $stage) {
            $createdStage = $game->stages()->create([
                'number' => $stage['number'],
            ]);

            $question = $createdStage->question()->create([
                'content' => $stage['question']['content'],
            ]);

            foreach ($stage['question']['answers'] as $answer) {
                $question->answers()->create([
                    'content' => $answer['content'],
                    'type'    => $answer['type'],
                ]);
            }
        }
    }
}
