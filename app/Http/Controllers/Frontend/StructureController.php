<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StructureController extends Controller
{
    //
    public function structure()
    {
        return view('frontend.structure.index');
    }
}
