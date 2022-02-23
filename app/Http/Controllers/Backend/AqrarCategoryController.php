<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CreateAqrarCategoryRequest;
use App\Http\Requests\Backend\CreateAqrarRequest;
use App\Http\Requests\Backend\CreateCategoryRequest;
use App\Models\Aqrarcategory;
use App\Models\Category;
use Illuminate\Http\Request;

class AqrarCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderBy = $request->orderBy ?? 'desc';
        $sortBy = $request->sortBy ?? 'id';
        $search = "";
        $aqrarcategories = Aqrarcategory::orderBy($sortBy, $orderBy)->paginate();
        if($orderBy === 'desc')
            $orderBy = 'asc';
        else
            $orderBy = 'desc';
        return view('backend.aqrarcategories.index', compact('aqrarcategories'), ['artists' => $aqrarcategories,
            'orderBy' => $orderBy,
            'sortBy' => $sortBy,
            'search'=>$search]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.aqrarcategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAqrarCategoryRequest $request)
    {
        $aqrarcategory = new Aqrarcategory();
        $aqrarcategory->title = $request->title;
        $aqrarcategory->status = $request->status;
        $aqrarcategory->save();
        return redirect()->route('backend.aqrarcategories.index');
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

        $aqrarcategory = Aqrarcategory::find($id);
        return view('backend.aqrarcategories.edit', compact('aqrarcategory'));    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $aqrarcategory = Aqrarcategory::find($id);
        $aqrarcategory->title = $request->title;
        $aqrarcategory->status = $request->status;
        $aqrarcategory->save();
        return redirect()->route('backend.aqrarcategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Aqrarcategory::where('id', $id)->delete();
        return response()->json(['message','ugurlu'], 200);
    }
}
