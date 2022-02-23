<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\StaticPage;
use Illuminate\Http\Request;

class RegulationController extends Controller
{
    //
    public function regulation(Request $request)
    {
        $id = $request->category;
        $regulation = StaticPage::orderBy('id', 'desc')->where('status', 1)->where('category', $id)->get(); 
        return view('frontend.regulation.index', compact('regulation'));
    }
}
