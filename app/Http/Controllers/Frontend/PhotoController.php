<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    //
    public function photos(Request $request)
    {  
        $photos = Photo::orderBy('id', 'desc')->get();
        return view('frontend.photos.index', compact('photos'));
    }
}
