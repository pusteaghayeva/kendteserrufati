<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Colleges;
use Illuminate\Http\Request;

class CollegesController extends Controller
{
    
    public function colleges(Request $request)
    {
        
        $colleges = Colleges::orderBy('id', 'desc')->where('status', 1)->get();
        return view('frontend.colleges.index', compact('colleges'));
      
    }

    public function single_college(Request $request)
    {
        $id = $request->college;
        $college = Colleges::where('id', $id)->get();
        return view('frontend.single_college.index', compact('college'));
      
    }
}
