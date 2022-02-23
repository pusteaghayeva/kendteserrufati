<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoGalleryController extends Controller
{
    //
    public function video_gallery(Request $request)
    {  
        $videos = Video::orderBy('id', 'desc')->get();
        return view('frontend.video_gallery.index', compact('videos'));
    }
}
