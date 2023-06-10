<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Merchandise;
use Illuminate\Http\Request;
use App\Models\CategoryMerchandise;
use App\Http\Controllers\Controller;

class MerchandiseController extends Controller
{
    public function index()
    {
        $category = CategoryMerchandise::all();
        $cat_merchandise = CategoryMerchandise::with(['merchandises' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])->when(request()->category, function ($category) {
            $category = $category->where('id', request()->category);
        })->paginate(6);

        return view('frontend.merchandise.index', compact('cat_merchandise', 'category'));
    }

    public function show($slug)
    {
        $merchandise = Merchandise::where('slug', $slug)->first();
        return view('frontend.merchandise.show', compact('merchandise'));
    }
}
