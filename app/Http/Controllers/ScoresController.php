<?php

namespace App\Http\Controllers;

use App\Models\Scores;
use Illuminate\Http\Request;

class ScoresController extends Controller
{
    public function index($id)
    {
        $teams = Scores::with(['teams', 'leagues'])->where('leaguesId', $id)->get();
        return view('scores')->with('teams', $teams);
    }
}
