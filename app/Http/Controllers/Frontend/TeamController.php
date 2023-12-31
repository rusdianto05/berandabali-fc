<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class Teamcontroller extends Controller
{
    public function index()
    {
        // $players = Team::where('type', 'Pemain')->latest()->get();
        // $coaches = Team::where('type', 'Pelatih')->latest()->get();
        // $staffs = Team::where('type', 'Staff')->latest()->get();
        $datas = Team::when(request()->type, function ($query) {
            $query->where('type', request()->type);
        })->when(!request()->type, function ($query) {
            $query->where('type', 'Pemain');
        })->latest()->get();
        $types = Team::select('type')->distinct()->get();
        return view('frontend.team.index', compact('datas', 'types'));
    }

    public function show($id)
    {
        $team = Team::findOrFail($id);
        return view('frontend.team.show', compact('team'));
    }
}
