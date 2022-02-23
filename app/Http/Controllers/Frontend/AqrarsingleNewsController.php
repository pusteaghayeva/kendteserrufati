<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Aqrarnews;
use App\Models\News;
use App\Models\NewsImage;
use Illuminate\Http\Request;

class AqrarsingleNewsController extends Controller
{
    public function aqrarsingle_news(Request $request)
    {
        $id= $request->id;
        $aqrarsingle_news = Aqrarnews::where('status', 1)->find($id);

        return view('frontend.aqrarsingle_news.index', compact('aqrarsingle_news', $aqrarsingle_news));
    }
}
