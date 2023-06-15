<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class Teamcontroller extends Controller
{
    public function index()
    {
        $players = Team::where('type', 'Pemain')->latest()->get();
        $coaches = Team::where('type', 'Pelatih')->latest()->get();
        $staffs = Team::where('type', 'Staff')->latest()->get();
        return view('frontend.team.index', compact('players', 'coaches', 'staffs'));
    }

    public function show()
    {
        return view('frontend.team.show');
    }
}
