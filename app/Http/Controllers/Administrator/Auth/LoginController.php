<?php

namespace App\Http\Controllers\Administrator\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administrator\Auth\LoginRequest;
use Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function login(LoginRequest $request)
    {
        if ($request->isMethod('get')) {
            return view('backend.auth.login');
        }
        $credentials = $request->only('email','password');
        if ($this->guard()->attempt($credentials)) {
            return redirect()->intended(route('backend.dashboard.index'));
        }
        return back()->with('error','Invalid credentials');
    }

    public function logout()
    {
        $this->guard()->logout();
        return back();
    }

    private function guard()
    {
        return Auth::guard('admin');
    }
}
