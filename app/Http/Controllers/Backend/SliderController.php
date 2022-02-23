<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CreateSliderRequest;
use App\Http\Requests\Backend\UpdateSliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sliders = DB::table('sliders')->orderBy('id', 'desc')->paginate(4);
        return view('backend.sliders.index', compact('sliders'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sliders = Slider::where('status', 1)->get();
        return view('backend.sliders.create', compact('sliders')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSliderRequest $request)
    {
        $image = $request->file('image');
        if(!empty($image)) {
          $name = 'sliders_' . time() . '.' . $image->getClientOriginalExtension();
          $image->move(public_path('/uploads/sliders'), $name);
        }else {
          $name = 'noPhoto.png';
        }
        Slider::create([
            'title' => $request->title,
            'image'=>$name,
            'status'=>$request->status,
        ]);
        return redirect()->route('backend.sliders.index');
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
        $slider = Slider::find($id);
        return view('backend.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSliderRequest $request, $id)
    {
        $slider = Slider::find($id);
        $slider->title = $request->title;
        $slider->status = $request->status;
        $image = $request->file('image');
        if ($_POST['hidden'] == "0") {
            $slider->image = 'noPhoto.png';
        }
        else if (empty($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])){
            $slider->image=$slider->image;
        }
        else{
            $name = 'slider_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/uploads/sliders'), $name);
            $slider->image=$name;
        }

        $slider->save();
        return redirect()->route('backend.sliders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Slider::where('id', $id)->delete();
        return response()->json(['message','ugurlu'], 200);
    }
}