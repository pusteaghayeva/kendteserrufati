<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CreateGalleryİmagesRequest;
use App\Http\Requests\Backend\UpdateGalleryİmagesRequest;
use App\Models\Galleryİmages;
use Illuminate\Http\Request;

class GalleryImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orderBy = $request->orderBy ?? 'desc';
        $sortBy = $request->sortBy ?? 'id';
        $search = "";
        $gallery_images = Galleryİmages::orderBy($sortBy, $orderBy)->paginate(3);
        if($orderBy === 'desc')
        $orderBy = 'asc';
    else
        $orderBy = 'desc';

return view('backend.gallery_images.index', compact('gallery_images'), ['artists' => $gallery_images,
                                    'orderBy' => $orderBy,
                                    'sortBy' => $sortBy,
                                    'search'=>$search]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.gallery_images.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateGalleryİmagesRequest $request)
    {
        $gallery_images = new Galleryİmages;
        $gallery_images->title = $request->title;
        $gallery_images->status = $request->status;
        $gallery_images->save();
        return redirect()->route('backend.gallery_images.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $photo_gallery = Galleryİmages::find($id);
        return view('backend.gallery_images.edit', compact('gallery_images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGalleryİmagesRequest $request, $id)
    {
        $gallery_images = Galleryİmages::find($id);
        $gallery_images->title = $request->title;
        $gallery_images->status = $request->status;
        $gallery_images->save();
        return redirect()->route('backend.gallery_images.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo_gallery = Galleryİmages::find($id);
        $photo_gallery->delete();
        return redirect()->route('backend.gallery_images.index');
    }
}
