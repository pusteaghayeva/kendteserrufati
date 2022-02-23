<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Law;
use Illuminate\Http\Request;

class LawsController extends Controller
{
    //
    public function laws(Request $request)
    {
        $id = $request->category;
        $laws = Law::orderBy('id', 'desc')->where('status', 1)->where('categories', $id)->get();
        $category = Category::where('id', $id)->get();
        return view('frontend.laws.index', compact('laws', 'category'));

        
    }
}
