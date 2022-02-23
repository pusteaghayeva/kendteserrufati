<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class FrontNewsController extends Controller
{
    public function news(Request $request)
    {   
        $search = $request->search;
        if(isset($search)){
            $news = News::with(['category'])->where('title', 'like', "%$search%")->where('category_id', '=', 19)->get();
        }
        else{
            $news = News::where('status', 1)->where('category_id', '=', $request->category)->orderBy('created_at', 'desc')->get();
        }
        return view('frontend.news.index', compact('news'));
      
    }

}
