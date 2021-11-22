<?php

namespace App\Http\Controllers;

use App\Models\Leagues;
use Illuminate\Http\Request;

class LeaguesController extends Controller
{

    public function index()
    {
        $leagues = Leagues::all();
        return view('leagues', compact('leagues'));
    }
}
