<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CreateAqrarnewsRequest;
use App\Http\Requests\Backend\CreateNewsRequest;
use App\Http\Requests\Backend\UpdateAqrarnewsRequest;
use App\Http\Requests\Backend\UpdateNewsRequest;
use App\Models\Aqrarcategory;
use App\Models\Aqrarnews;
use App\Models\Category;
use App\Models\Law;
use App\Models\News;
use Illuminate\Http\Request;

class AqrarNewsController extends Controller
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
            $aqrarnews = News::with(['aqrarcategory'])->orderBy('id', 'desc')->where('title', 'like', "%$search%")->paginate(6);
        }
        else{
            $aqrarnews = Aqrarnews::with(['aqrarcategory'])->orderBy('id', 'desc')->paginate(6);

        }
        return view('backend.aqrarnews.index', compact('aqrarnews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aqrarcategories = Aqrarcategory::where('status', 1)->get();
        return view('backend.aqrarnews.create', compact('aqrarcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAqrarnewsRequest $request)
    {
        $image = $request->file('image');
        if(!empty($image)) {
            $name = 'aqrarnews_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/uploads/aqrarnews'), $name);
        }else {
            $name = 'noPhoto.png';
        }

        $pdfname ="";
        $pdf =$request->file('file');
        if(!empty($pdf)) {
            $pdfname = 'aqrarnews_' . time() . '.' . $pdf->getClientOriginalExtension();
            $pdf->move(public_path('/uploads/pdf'), $pdfname);
        }
        Aqrarnews::create([
            'title' => $request->title,
            'category_id'=>$request->category_id,
            'file' => $pdfname,
            'image'=>$name,
            'content'=>$request->content,
            'status'=>$request->status,
        ]);
        return redirect()->route('backend.aqrarnews.index');
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
        $aqrarnews = Aqrarnews::find($id);
        $aqrarcategories = Aqrarcategory::where('status', 1)->get();
        return view('backend.aqrarnews.edit', compact('aqrarcategories', 'aqrarnews'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAqrarnewsRequest $request, $id)
    {
        $aqrarnews = Aqrarnews::find($id);
        $aqrarnews->title = $request->title;
        $aqrarnews->content = $request->content;
        $aqrarnews->category_id = $request->category_id;
        $aqrarnews->status = $request->status;
        $image = $request->file('image');
        if ($_POST['hidden'] == "0") {
            $aqrarnews->image = 'noPhoto.png';
        }
        else if (empty($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])){
            $aqrarnews->image=$aqrarnews->image;
        }
        else{
            $name = 'aqrarnews_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/uploads/aqrarnews'), $name);
            $aqrarnews->image=$name;
        }
        $pdfname ="";
        $pdf =$request->file('file');
        if(!empty($pdf)) {
            $pdfname = 'aqrarnews_' . time() . '.' . $pdf->getClientOriginalExtension();
            $pdf->move(public_path('/uploads/pdf'), $pdfname);
        }
        else {
            $pdfname = $aqrarnews->file;
        }
        $aqrarnews->file = $pdfname;
        $aqrarnews->save();
        return redirect()->route('backend.aqrarnews.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Aqrarnews::where('id', $id)->delete();
        return response()->json(['message','ugurlu'], 200);
    }
}
