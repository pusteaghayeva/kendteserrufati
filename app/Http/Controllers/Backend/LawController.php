<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CreateLawRequest;
use App\Http\Requests\Backend\UpdateLawRequest;
use App\Models\Category;
use App\Models\Law;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $orderBy = $request->orderBy ?? 'desc';
        $sortBy = $request->sortBy ?? 'id';
        if(isset($search)){
            $laws = Law::orderBy($sortBy, $orderBy)->where('title', 'like', "%$search%")->paginate(4);
        }
        else{
              $laws = Law::orderBy($sortBy, $orderBy)->paginate(4);

        }
        
        if($orderBy === 'desc')
        $orderBy = 'asc';
        else
            $orderBy = 'desc';
        return view('backend.laws.index', compact('laws'), ['artists' => $laws,
                                        'orderBy' => $orderBy,
                                        'sortBy' => $sortBy,
                                        'search'=>$search]);
        $laws = Law::all();
        return view('backend.laws.index', compact('laws'));

        $laws = Law::with('galleries')->orderBy('id', 'desc')->paginate(4);
        return view('backend.laws.index', compact('laws'));      
      
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $laws = Law::where('status', 1)->get();
        $categories = Category::where('status', 1)->where('id',7)->orWhere('id',8)->orWhere('id',9)->orWhere('id',10)->orWhere('id',11)->orWhere('id',12)->orWhere('id',27)->get();
        return view('backend.laws.create', compact('categories')); 

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateLawRequest $request)
    {
        $name="";  
        $pdfname ="";
        $image = $request->file('image');
          $pdf =$request->file('file');
          if(!empty($image)) {
            $name = 'laws_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/uploads/laws'), $name);
          }else {
            $name = 'noPhoto.png';
          }

          if(!empty($pdf)) {
            $pdfname = 'laws_' . time() . '.' . $pdf->getClientOriginalExtension();
            $pdf->move(public_path('/uploads/pdf'), $pdfname);
          }
          Law::create([
              'title' => $request->title,
              'categories'=>$request->categories,
              'content'=>$request->content,
              'file' => $pdfname,
              'image'=>$name,
              'status'=>$request->status,
          ]);
          return redirect()->route('backend.laws.index');
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
        $law = Law::find($id);
        $categories = Category::where('status', 1)->where('id',7)->orWhere('id',8)->orWhere('id',9)->orWhere('id',10)->orWhere('id',11)->orWhere('id',12)->orWhere('id',27)->get();
        return view('backend.laws.edit', compact('categories', 'law')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLawRequest $request, $id)
    {

        $law = Law::find($id);
        $law->title = $request->title;
        $law->content = $request->content;
        $law->categories = $request->categories;
        $law->status = $request->status;
        $image = $request->file('image');
        if ($_POST['hidden'] == "0") {
            $law->image = 'noPhoto.png';
        }
        else if (empty($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])){
            $law->image=$law->image;
        }
        else{
            $name = 'page_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/uploads/laws'), $name);
            $law->image=$name;
        }
        $pdfname ="";
        $pdf =$request->file('file');
        if(!empty($pdf)) {
            $pdfname = 'laws_' . time() . '.' . $pdf->getClientOriginalExtension();
            $pdf->move(public_path('/uploads/pdf'), $pdfname);  
        }
        else {
            $pdfname = $law->file;
        }
        $law->file = $pdfname;
        $law->save();
        return redirect()->route('backend.laws.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $news = Law::find($id);
        // $news->delete();
        // return redirect()->route('backend.laws.index');

        Law::where('id', $id)->delete();
        return response()->json(['message','ugurlu'], 200);
    }
}
