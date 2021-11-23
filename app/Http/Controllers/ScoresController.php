<?php

namespace App\Http\Controllers;

use App\Models\Scores;
use App\Models\Teams;
use Illuminate\Http\Request;

class ScoresController extends Controller
{
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

    public function store(Request $request, $id)
    {
        Teams::create([
            'leaguesId' => $id,
            'name' => $request->name
        ]);


        return redirect()->route('footballTeams.index', $id)->withSuccess('League Başarı ile Oluşturuldu');
    }
}
