<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CreateStaticPagesRequest;
use App\Http\Requests\Backend\UpdateStaticPagesRequest;
use App\Models\Category;
use App\Models\StaticPage;
use Illuminate\Http\Request;

class StaticPagesController extends Controller
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
            $static_pages = StaticPage::with(['categoryname'])->orderBy('id', 'desc')->where('title', 'like', "%$search%")->paginate(4); 

        }
        else{
            $static_pages = StaticPage::with(['categoryname'])->orderBy('id', 'desc')->paginate(4); 

        }
        return view('backend.static_pages.index', compact('static_pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('status', 1)->where('id', 16)->orWhere('id',18)->orWhere('id',15)->orWhere('id',28)->get();
        return view('backend.static_pages.create', compact('category')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateStaticPagesRequest $request)
    {
        StaticPage::create([
            'title' => $request->title,
            'category'=>$request->category,
            'content'=>$request->content,
            'status'=>$request->status,
        ]);
        return redirect()->route('backend.static_pages.index');
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
        $static_pages = StaticPage::find($id);
        $category = Category::where('status', 1)->where('id', 16)->orWhere('id',18)->orWhere('id',15)->orWhere('id',17)->orWhere('id',28)->get();
        return view('backend.static_pages.edit', compact('category', 'static_pages')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStaticPagesRequest $request, $id)
    {
        $static_pages = StaticPage::find($id);
        $static_pages->title = $request->title;
        $static_pages->category = $request->category;
        $static_pages->status =$request-> status;
        $static_pages->content = $request->content;
        $static_pages->save();
        return redirect()->route('backend.static_pages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        
        StaticPage::where('id', $id)->delete();
        return response()->json(['message','ugurlu'], 200);
    }
}
