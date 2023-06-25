<?php

namespace App\Http\Controllers\Frontend;

use App\Models\GaleryImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GaleryController extends Controller
{
    public function index()
    {
        $sliders = GaleryImage::where('is_slider', true)->latest()->get();
        $galeries = GaleryImage::where('is_slider', false)->latest()->paginate(10);
        return view('frontend.galery.index', compact('sliders', 'galeries'));
    }
}
