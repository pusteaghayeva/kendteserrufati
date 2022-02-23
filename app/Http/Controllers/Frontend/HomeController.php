<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $news = News::where('status', 1)->where('category_id', 19)->orderBy('created_at', 'desc')->limit(6)->get();

  
        $sliders = Slider::where('status', 1)->get();
        

        return view('frontend.home.index', compact('sliders', 'news'));
    }
}
