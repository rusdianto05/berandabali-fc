<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Article;
use App\Models\TeamMatch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $match = TeamMatch::where('status', 'UPCOMING')->take(2)->orderBy('match_date', 'ASC')->get();
        $article = Article::orderBy('created_at', 'DESC')->get();
        return view('frontend.home.index', compact('match', 'article'));
    }
}