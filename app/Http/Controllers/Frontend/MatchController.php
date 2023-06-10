<?php

namespace App\Http\Controllers\Frontend;

use App\Models\TeamMatch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MatchController extends Controller
{
    public function index()
    {
        $latest_match = TeamMatch::where('status', 'FINISHED')->orderBy('match_date', 'DESC')->first();
        $next_match = TeamMatch::where('status', 'UPCOMING')->orderBy('match_date', 'ASC')->get();
        return view('frontend.match.index', compact('latest_match', 'next_match'));
    }
}
