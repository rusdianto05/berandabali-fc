<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index()
    {
        $article = Article::orderBy('created_at', 'DESC')->paginate(8);
        $top_article = Article::orderBy('total_view', 'DESC')->take(3)->get();
        $slider_article = Article::orderBy('total_view', 'DESC')->first();
        return view('frontend.article.index', compact('article', 'top_article', 'slider_article'));
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->first();
        $article->increment('total_view');
        return view('frontend.article.show', compact('article'));
    }
}
