<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GaleryImage;

class ProfileController extends Controller
{
    public function index()
    {
        $championships = Article::whereHas('categoryArticle', function ($query) {
            $query->where('name', 'like', '%juara%');
        })->where('status', 'PUBLISH')->latest()->get();
        $galleries = GaleryImage::latest()->get();
        return view('frontend.profile.index', compact('championships', 'galleries'));
    }
}
