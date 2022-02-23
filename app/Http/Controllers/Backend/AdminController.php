<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CreateAdminRequest;
use App\Http\Requests\Backend\UpdateAdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
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
        $admins = Admin::orderBy($sortBy, $orderBy)->paginate(4);
        if($orderBy === 'desc')
        $orderBy = 'asc';
    else
        $orderBy = 'desc';

return view('backend.admins.create', compact('admins'), ['artists' => $admins,
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
        //
        return view('backend.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAdminRequest $request)
    {
        $admin = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->save();
        return redirect()->route('backend.admins.index');
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
        $admin = Admin::find($id);
        return view('backend.admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminRequest $request, $id)
    {
        $admin = Admin::find($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = is_null($request->password) ? $admin->password : Hash::make($request->password);
        $admin->save();
        return redirect()->route('backend.admins.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $admin = Admin::find($id);
        // $admin->delete();
        // return redirect()->route('backend.admins.index');

        Admin::where('id', $id)->delete();
        return response()->json(['message','ugurlu'], 200);
    }
}
