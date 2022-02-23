<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CreateCollegesRequest;
use App\Http\Requests\Backend\UpdateCollegesRequest;
use App\Models\Category;
use App\Models\Colleges;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CollegesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
 
        $colleges = DB::table('colleges')->orderBy('id', 'desc')->paginate(4);
        return view('backend.colleges.index', compact('colleges'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status', 1)->get();
        return view('backend.colleges.create', compact('categories')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCollegesRequest $request)
    {
//        $image = $request->file('image');
//        if(!empty($image)) {
//          $name = 'colleges_' . time() . '.' . $image->getClientOriginalExtension();
//          $image->move(public_path('/uploads/colleges'), $name);
//        }else {
//          $name = 'noPhoto.png';
//        }
          Colleges::create([
              'name' =>$request->name,
              'surname'=>$request->surname,
//              'image'=>$name,
//              'content'=>$request->content,
              'status'=>$request->status,
          ]);
          return redirect()->route('backend.colleges.index');
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
        $college = Colleges::find($id);
        return view('backend.colleges.edit', compact( 'college')); 

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCollegesRequest $request, $id)
    {
        $college = Colleges::find($id);
        $college->name = $request->name;
        $college->surname = $request->surname;
//        $college->content = $request->content;
//        $image = $request->file('image');
//        if ($_POST['hidden'] == "0") {
//            $college->image = 'noPhoto.png';
//        }
//        else if (empty($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])){
//            $college->image=$college->image;
////        }
//        else{
//            $name = 'colleges_' . time() . '.' . $image->getClientOriginalExtension();
//            $image->move(public_path('/uploads/colleges'), $name);
//            $college->image=$name;
//        }
        $college->save();
        return redirect()->route('backend.colleges.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Colleges::where('id', $id)->delete();
        return response()->json(['message','ugurlu'], 200);
    }
}
