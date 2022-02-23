<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CreatePhotoRequest;
use App\Http\Requests\Backend\UpdatePhotoRequest;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = DB::table('photos')->orderBy('id', 'desc')->paginate(4);
        return view('backend.photos.index', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $photos = Photo::get();
        return view('backend.photos.create', compact('photos')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePhotoRequest $request)
    {
        $images = $request->file('images');
        if(!empty($images)) {
          $name = 'photos_' . time() . '.' . $images->getClientOriginalExtension();
          $images->move(public_path('/uploads/photos'), $name);
        }else {
          $name = 'noPhoto.png';
        }
        Photo::create([
            'images'=>$name,
        ]);
        return redirect()->route('backend.photos.index');
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
        $photos = Photo::find($id);
        return view('backend.photos.edit', compact('photos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePhotoRequest $request, $id)
    {
        $photos = Photo::find($id);
        $photos->images = $request->images;
        $images = $request->file('images');
        if ($_POST['hidden'] == "0") {
            $photos->images = 'noPhoto.png';
        }
        else if (empty($_FILES['images']['tmp_name']) || !is_uploaded_file($_FILES['images']['tmp_name'])){
            $photos->images=$photos->images;
        }
        else{
            $name = 'photos_' . time() . '.' . $images->getClientOriginalExtension();
            $images->move(public_path('/uploads/photos'), $name);
            $photos->images=$name;
        }
        $photos->save();
        return redirect()->route('backend.photos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Photo::where('id', $id)->delete();
        return response()->json(['message','ugurlu'], 200);
    }
}
