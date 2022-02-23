<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsImage;
use Illuminate\Http\Request;

class SingleNewsController extends Controller
{
    //
    public function single_news(Request $request)
    {   
        $id= $request->id;
        $single_news = News::where('status', 1)->find($id);

        $photo = NewsImage::where('news_id', $id)->get();
        return view('frontend.single_news.index', compact('single_news', 'photo'));
    }
}
