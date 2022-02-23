<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CreateNewsRequest;
use App\Http\Requests\Backend\UpdateNewsRequest;
use App\Models\Category;
use App\Models\Law;
use App\Models\News;
use App\Models\PhotoGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        $search = $request->search;
        if(isset($search)){
            $news = News::with(['category'])->orderBy('id', 'desc')->where('title', 'like', "%$search%")->paginate(6); 
        }
        else{
            $news = News::with(['category'])->orderBy('id', 'desc')->paginate(6); 

        }
        return view('backend.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $news = News::where('status', 1)->get();
        $categories = Category::where('status', 1)->where('id',19)->orWhere('id',29)->get();
        return view('backend.news.create', compact('categories')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateNewsRequest $request)
    {
        $image = $request->file('image');
        if(!empty($image)) {
          $name = 'news_' . time() . '.' . $image->getClientOriginalExtension();
          $image->move(public_path('/uploads/news'), $name);
        }else {
          $name = 'noPhoto.png';
        }
          News::create([
              'title' => $request->title,
              'category_id'=>$request->category_id,
              'image'=>$name,
              'content'=>$request->content,
              'status'=>$request->status,
          ]);
          return redirect()->route('backend.news.index');
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
        $news = News::find($id);
        $categories = Category::where('status', 1)->where('id',19)->orWhere('id',29)->get();
        return view('backend.news.edit', compact('categories', 'news')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsRequest $request, $id)
    {
        $news = News::find($id);
        $news->title = $request->title;
        $news->category_id = $request->category_id;
        $news->content = $request->content;
        $image = $request->file('image');
        if ($_POST['hidden'] == "0") {
            $news->image = 'noPhoto.png';
        }
        else if (empty($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])){
            $news->image=$news->image;
        }
        else{
            $name = 'news_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/uploads/news'), $name);
            $news->image=$name;
        }
        $news->save();
        return redirect()->route('backend.news.index');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        News::where('id', $id)->delete();
        return response()->json(['message','ugurlu'], 200);
    }
}
