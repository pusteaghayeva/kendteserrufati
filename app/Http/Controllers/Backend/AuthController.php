<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\LoginRequest;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Auth\Events\Attempting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login_form()
    {
        return view('backend.login.index');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);
        $remember_me = $request->remember_me == "on";
        if (Auth::guard('admin')->attempt($credentials, $remember_me)) {
            return redirect()->route('backend.dashboard');
        } else {
            return back()->with('login_error', 'Email və ya şifrə yanlışdır.');
        }
    }

    public function logout()
    {
        Auth::guard('')->logout();
        return redirect()->route('backend.login.form');
    }
}
