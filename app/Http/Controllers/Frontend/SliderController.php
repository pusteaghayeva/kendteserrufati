<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    //
    public function sliders(Request $request)
    {
        $sliders = Slider::where('status', 1)->get();
        return view('frontend.home.slider', compact('sliders'));
    }
}
