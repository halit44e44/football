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
        $scores = Scores::with(['teams', 'leagues'])->where('leaguesId', $id)->orderByDesc('point')->orderByDesc('totalGoals')->get();
        $alert = null;
        try {
            $finishedMatches = FinishedMatches::with(['teamsAway', 'teamsOwner'])->where('leaguesId', $id)->where('score1', null)->get()->random(1);
        } catch (\Exception $exception) {
            $alert = "Şu anda oynanacak maç yoktur.";
            $finishedMatches[] = [];
        }
        $oldMatches = FinishedMatches::with(['teamsAway', 'teamsOwner'])->where('leaguesId', $id)->whereNotNull('score1')->get();

        return view('scores.index', [
            'scores' => $scores,
            'leaguesId' => $id,
            'match' => $finishedMatches[0],
            'oldMatch' => $oldMatches,
            'alert' => $alert
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
                            'away' => $team2->teams->id
                        ]);
                    }
                }
            }
        }
        return redirect()->back();
    }

    public function game($id)
    {
        $score1 = rand(0, 5);
        $score2 = rand(0, 5);
        FinishedMatches::where('id', $id)->update([
            'score1' => $score1,
            'score2' => $score2
        ]);
        $finishedMatches = FinishedMatches::where('id', $id)->first();

        $owner = Scores::where('teamsId', $finishedMatches->houseOwner)->first();
        $away = Scores::where('teamsId', $finishedMatches->away)->first();

        if ($score1 > $score2) {
            $owner->update([
                'pastMatch' => $owner->pastMatch + 1,
                'point' => $owner->point + 3,
                'winPoint' => $owner->winPoint + 1,
                'totalGoals' => $owner->totalGoals + $score1
            ]);
            $away->update([
                'pastMatch' => $away->pastMatch + 1,
                'losePoint' => $away->losePoint + 1,
                'totalGoals' => $away->totalGoals + $score2
            ]);
        } elseif ($score2 > $score1) {
            $away->update([
                'pastMatch' => $away->pastMatch + 1,
                'point' => $away->point + 3,
                'winPoint' => $away->winPoint + 1,
                'totalGoals' => $away->totalGoals + $score2
            ]);
            $owner->update([
                'pastMatch' => $owner->pastMatch + 1,
                'losePoint' => $owner->losePoint + 1,
                'totalGoals' => $owner->totalGoals + $score1
            ]);
        } else {
            $owner->update([
                'pastMatch' => $owner->pastMatch + 1,
                'point' => $owner->point + 1,
                'draw' => $owner->draw + 1,
                'totalGoals' => $owner->totalGoals + $score1
            ]);
            $away->update([
                'pastMatch' => $away->pastMatch + 1,
                'point' => $away->point + 1,
                'draw' => $away->draw + 1,
                'totalGoals' => $away->totalGoals + $score2
            ]);
        }
        return redirect()->back();
//        return redirect()->route('scores.index')->withSuccess('Maç Başarılı');

    }

}
