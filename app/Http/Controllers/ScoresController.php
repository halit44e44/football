<?php

namespace App\Http\Controllers;

use App\Models\Scores;
use App\Models\Teams;
use Illuminate\Http\Request;

class ScoresController extends Controller
{
    public $lastId;
    public function index($id)
    {
        $teams = Scores::with(['teams', 'leagues'])->where('leaguesId', $id)->get();
        return view('scores.index', [
            'teams' => $teams,
            'leaguesId' => $id
        ]);
    }

    public function create($id)
    {
        return view('scores.create', compact('id'));
    }

    public function store(Request $request, $leaguesId)
    {
        Teams::create([
            'leaguesId' => $leaguesId,
            'name' => $request->name
        ]);

        $this->lastId = Teams::latest()->limit(1)->get();

        Scores::create([
            'teamsId' => $this->lastId,
            'leaguesId' => $leaguesId,
            'point' => 0,
            'winPoint' => 0,
            'losePoint' => 0,
            'draw' => 0,
            'totalGoals' => 0
        ]);


        return redirect()->route('footballTeams.index', $leaguesId)->withSuccess('League Başarı ile Oluşturuldu');
    }
}
