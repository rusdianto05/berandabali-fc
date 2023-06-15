<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        $championships = Article::with(['categoryArticle' => function ($query) {
            $query->where('name', 'Juara');
        }])->where('status', 1)->orderBy('created_at', 'desc')->take(6)->get();
        return view('frontend.profile.index', compact('championships'));
    }
}
