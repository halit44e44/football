<?php

namespace App\Http\Controllers;

use App\Models\Teams;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    public function index($id)
    {
        $teams = Teams::with('leagues')->where('leaguesId', $id)->get();
        return view('teams.index', [
            'teams' => $teams,
            'leaguesId' => $id,
            'teamsCount' => $teams->count()
        ]);
    }

    public function create($id)
    {
        return view('teams.create', compact('id'));
    }

    public function store(Request $request, $leaguesId)
    {
        $teams = Teams::all();
        if ($teams->count() < 4) {
            Teams::create([
                'leaguesId' => $leaguesId,
                'name' => $request->name
            ]);
        } else {
            dd("Error");
        }


        return redirect()->route('footballTeams.index', $leaguesId)->withSuccess('League Başarı ile Oluşturuldu');
    }
}
