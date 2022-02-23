<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CreateVideoRequest;
use App\Http\Requests\Backend\UpdateVideoRequest;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VideoController extends Controller
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
        $videos = Video::orderBy($sortBy, $orderBy)->paginate(4);
        if($orderBy === 'desc')
        $orderBy = 'asc';
    else
        $orderBy = 'desc';

return view('backend.videos.index', compact('videos'), ['artists' => $videos,
                                    'orderBy' => $orderBy,
                                    'sortBy' => $sortBy,
                                    'search'=>$search]);
        $videos = Video::all();
        return view('backend.videos.index', compact('videos'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $videos = Video::get();
        return view('backend.videos.create', compact('videos')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateVideoRequest $request)
    {
        $images = $request->file('images');
        if(!empty($images)) {
          $name = 'video_' . time() . '.' . $images->getClientOriginalExtension();
          $images->move(public_path('/uploads/videos'), $name);
        }else {
          $name = 'noPhoto.png';
        }
        Video::create([
            'title' => $request->title,
            'images'=>$name,
            'url' => $request->url,
        
        ]);
        return redirect()->route('backend.videos.index');
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
        $video = Video::find($id);
        return view('backend.videos.edit', compact('video'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVideoRequest $request, $id)
    {
        $video = Video::find($id);
        $video->title = $request->title;
        // $video->images = $request->images;
        $video->url= $request->url;
        $images = $request->file('images');
        if ($_POST['hidden'] == "0") {
            $video->images = 'noPhoto.png';
        }
        else if (empty($_FILES['images']['tmp_name']) || !is_uploaded_file($_FILES['images']['tmp_name'])){
            $video->images=$video->images;
        }
        else{
            $name = 'video_' . time() . '.' . $images->getClientOriginalExtension();
            $images->move(public_path('/uploads/videos'), $name);
            $video->images=$name;
        }
        $video->save();
        return redirect()->route('backend.videos.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Video::where('id', $id)->delete();
        return response()->json(['message','ugurlu'], 200);
    }
}
