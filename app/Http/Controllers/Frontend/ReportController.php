<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\StaticPage;
use Illuminate\Http\Request;

class ReportController extends Controller
{
      public function report(Request $request)
    {
        $id = $request->category;
        $report = StaticPage::orderBy('id', 'desc')->where('status', 1)->where('category', $id)->get(); 
        return view('frontend.report.index', compact('report'));
    }

    public function single_report(Request $request){
        $id= $request->report;
        $single_report = StaticPage::where('status', 1)->find($id);
        return view('frontend.single_report.index', compact('single_report'));
    }
    
}
