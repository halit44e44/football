<?php

namespace App\Http\Controllers;

use App\Models\Leagues;
use Illuminate\Http\Request;

class LeaguesController extends Controller
{

    public function index()
    {
        $leagues = Leagues::all();
        return view('leagues.index', compact('leagues'));
    }

    public function create()
    {
        return view('leagues.create');
    }

    public function store(Request $request)
    {
        Leagues::create($request->post());
        return redirect()->route('leagues.index')->withSuccess('Quiz Başarı ile Oluşturuldu');
    }

    public function delete($id)
    {
        if (isset($id)) {
            Leagues::find($id)->delete();
            return redirect()->route('leagues.index')->withSuccess('Quiz Başarılı Bir Şekilde Silindi');
        }
    }
}
