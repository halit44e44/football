<?php

namespace App\Http\Controllers;

use App\Models\Scores;
use App\Models\Teams;

class ScoresController extends Controller
{
    public function index($id)
    {
        $teams = Teams::with(['teams', 'leagues'])->where('leaguesId', $id)->get();
        foreach ($teams as $item) {
            $scoresId = Scores::where('teamsId', $item->id)->first();
            if (empty($scoresId)) {
                Scores::create([
                    'teamsId' => $item->id,
                    'leaguesId' => $item->leaguesId,
                    'pastMatch' => 0,
                    'point' => 0,
                    'winPoint' => 0,
                    'losePoint' => 0,
                    'draw' => 0,
                    'totalGoals' => 0
                ]);
            }
        }
        $scores = Scores::with(['teams', 'leagues'])->where('leaguesId', $id)->get();

        return view('scores.index', [
            'scores' => $scores,
            'leaguesId' => $id
        ]);
    }

    public function start($id)
    {
        $scores = Scores::with(['teams', 'leagues'])->where('leaguesId', $id)->get();

        for ($i = 0; $i < $scores->count(); $i++) {
            for ($j = 0; $j < $scores->count(); $j++) {
                echo "a<br>";
            }
        }

        return view('scores.index', [
            'scores' => $scores,
            'leaguesId' => $id
        ]);
    }

}
