<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Aqrarnews;
use App\Models\News;
use Illuminate\Http\Request;

class AqrarNewsController extends Controller
{
    public function aqrarnews(Request $request)
    {
        $search = $request->search;
        if(isset($search)){
            $aqrarnews = Aqrarnews::with(['category'])->where('title', 'like', "%$search%")->get();
        }
        else{
            $aqrarnews = Aqrarnews::where('status', 1)->orderBy('created_at', 'desc')->get();
        }
        return view('frontend.aqrarnews.index', compact('aqrarnews'));

    }
}
