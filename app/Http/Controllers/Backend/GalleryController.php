<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PostGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{

    public function dropzone() {
        return view('backend.gallery.index');
    }
    
    // public function dropzoneStore(Request $request)
    // {
    //     $image = $request->file('file');
    //     $name = $image->getClientOriginalName();
    //     $extension = $image->getClientOriginalExtension();
    //     $explode = explode('.', $name);
    //     $name = $explode[0] . '_' . now()->format('d-m-Y_H-i-s') . '.' . $extension;
    //     $publicPath = 'public/';
    //     $path = 'postImage/';
    //     Storage::putFileAs($publicPath . $path, $image, $name);

    //     $imageUpload = new PostGallery();
    //     $imageUpload->image = $path . $name;
    //     $imageUpload->save();

    //     // return redirect()->route('backend.dropzone');
    // }
}
