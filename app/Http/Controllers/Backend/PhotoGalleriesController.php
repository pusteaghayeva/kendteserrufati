<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CreatePhotoGalleriesRequest;
use App\Http\Requests\Backend\UpdatePhotoGalleriesRequest;
// use App\Models\PhotoGalleries;
use App\Models\PhotoGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PhotoGalleriesController extends Controller
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
        $photo_galleries = PhotoGallery::orderBy($sortBy, $orderBy)->paginate(3);
        if($orderBy === 'desc')
        $orderBy = 'asc';
    else
        $orderBy = 'desc';

return view('backend.photo_galleries.index', compact('photo_galleries'), ['artists' => $photo_galleries,
                                    'orderBy' => $orderBy,
                                    'sortBy' => $sortBy,
                                    'search'=>$search]);
                                    $photo_galleries = PhotoGallery::all();
        return view('backend.photo_galleries.index', compact('photo_galleries'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // return view('backend.photo_galleries.create');
        $photo_galleries = PhotoGallery::where('status', 1)->get();
        return view('backend.photo_galleries.create', compact('photo_galleries')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePhotoGalleriesRequest $request)
    {
        $photo_gallery = new PhotoGallery;
        $photo_gallery->title = $request->title;
        $photo_gallery->status = $request->status;
        $photo_gallery->save();
        return redirect()->route('backend.photo_galleries.index');
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
        $photo_gallery = PhotoGallery::find($id);
        return view('backend.photo_galleries.edit', compact('photo_gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePhotoGalleriesRequest $request, $id)
    {
        $photo_gallery = PhotoGallery::find($id);
        $photo_gallery->title = $request->title;
        $photo_gallery->status = $request->status;
        $photo_gallery->save();
        return redirect()->route('backend.photo_galleries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $photo_gallery = PhotoGallery::find($id);
        // $photo_gallery->delete();
        // return redirect()->route('backend.photo_galleries.index');
        PhotoGallery::where('id', $id)->delete();
        return response()->json(['message','ugurlu'], 200);
    }
}