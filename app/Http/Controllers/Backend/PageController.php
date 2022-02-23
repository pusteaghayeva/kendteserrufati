<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CreatePageRequest;
use App\Http\Requests\Backend\UpdatePageRequest;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pages = DB::table('pages')->orderBy('id', 'desc')->paginate(4);
        return view('backend.pages.index', compact('pages'));
  
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $pages = Page::where('status', 1)->get();
        return view('backend.pages.create', compact('pages')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePageRequest $request)
    {
          $image = $request->file('image');
          if(!empty($image)) {
            $name = 'pages_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/uploads/pages'), $name);
          }else {
            $name = 'noPhoto.png';
          }
          Page::create([
              'title' => $request->title,
              'content'=>$request->content,
              'image'=>$name,
              'status'=>$request->status,
          ]);
          return redirect()->route('backend.pages.index');
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
        $page = Page::find($id);
        return view('backend.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePageRequest $request, $id)
    {
        $page = Page::find($id);
        $page->title = $request->title;
        $page->content = $request->content;
        $page->status = $request->status;
        $image = $request->file('image');
        if ($_POST['hidden'] == "0") {
            $page->image = 'noPhoto.png';
        }
        else if (empty($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])){
            $page->image=$page->image;
        }
        else{
            $name = 'page_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/uploads/pages'), $name);
            $page->image=$name;
        }
        
        $page->save();
        return redirect()->route('backend.pages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Page::where('id', $id)->delete();
      return response()->json(['message','ugurlu'], 200);
    }
}
