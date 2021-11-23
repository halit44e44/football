<?php

namespace App\Http\Controllers;

use App\Models\FinishedMatches;
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

        $finishedMatches = FinishedMatches::with(['teamsAway', 'teamsOwner'])->where('leaguesId', $id)->where('score', '')->first();

        return view('scores.index', [
            'scores' => $scores,
            'leaguesId' => $id,
            'match' => $finishedMatches
        ]);
    }

    public function start($id)
    {
        $scores = Scores::with(['teams', 'leagues'])->where('leaguesId', $id)->get();
        $finishedMatches = FinishedMatches::where('leaguesId', $id)->first();
        if (empty($finishedMatches)) {
            foreach ($scores as $team1) {
                foreach ($scores as $team2) {
                    if ($team1->teamsId !== $team2->teamsId) {
                        FinishedMatches::create([
                            'leaguesId' => $id,
                            'houseOwner' => $team1->teams->id,
                            'away' => $team2->teams->id,
                            'score' => ''
                        ]);
                    }
                }
            }
        }
        return redirect()->back();


    }

}
