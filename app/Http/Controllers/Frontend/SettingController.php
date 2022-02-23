<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function setting(Request $request)
    {
        $setting = Settings::where('id',1)->get();
        // dd($setting);
        return view('frontend.settings.edit', compact('setting'));
    }
}
