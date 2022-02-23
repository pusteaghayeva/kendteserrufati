<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CreateCategoryRequest;
use App\Http\Requests\Backend\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   $orderBy = $request->orderBy ?? 'desc';
        $sortBy = $request->sortBy ?? 'id';
        $search = "";
        $categories = Category::orderBy($sortBy, $orderBy)->paginate();
        if($orderBy === 'desc')
        $orderBy = 'asc';
    else
        $orderBy = 'desc';
    return view('backend.categories.index', compact('categories'), ['artists' => $categories,
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
        return view('backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $category = new Category;
        $category->title = $request->title;
        $category->status = $request->status;
        $category->save();
        return redirect()->route('backend.categories.index');
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
        $category = Category::find($id);
        return view('backend.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = Category::find($id);
        $category->title = $request->title;
        $category->status = $request->status;
        $category->save();
        return redirect()->route('backend.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $category = Category::find($id);
        // $category->delete();
        // return redirect()->route('backend.categories.index');

        Category::where('id', $id)->delete();
        return response()->json(['message','ugurlu'], 200);
    }
}
