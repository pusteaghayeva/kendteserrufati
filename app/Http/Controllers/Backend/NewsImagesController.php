<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CreateNewsImageRequest;
use App\Models\News;
use App\Models\NewsImage;
use Illuminate\Http\Request;

class NewsImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->image;
        $news_images = NewsImage::where('news_id', $id)->orderBy('id', 'desc')->get(); 
        return view('backend.news_images.index', compact('news_images', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
     $news= $request->img;
        return view('backend.news_images.create', compact('news')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateNewsImageRequest $request)
    {
        // dd($request->image_id);
        $image = $request->file('image');
        if(!empty($image)) {
          $name = 'news_images_' . time() . '.' . $image->getClientOriginalExtension();
          $image->move(public_path('/uploads/news_images'), $name);
        }else {
          $name = 'noPhoto.png';
        }
          NewsImage::create([
            'news_id' =>$request->image_id,
            'image'=>$name,
          ]);

        return redirect()->route('backend.news_images.index', ['image'=>$request->image_id]); 
       
          
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        NewsImage::where('id', $id)->delete();
        return response()->json(['message','ugurlu'], 200);
    }
}
