<?php

namespace App\Http\Controllers\Frontend\Customer\Auth;

use App\Http\Controllers\Controller;
use Auth;
use App\Http\Requests\Customer\Auth\LoginRequest;
use \Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:web')->except(['logout','me']);
    }

    public function login(LoginRequest $request)
    {
        if ($request->isMethod('get')) {
            return view('frontend.customer.auth.login');
        }

        $credentials = $request->only('email','password');

        if ($request->ajax()) {
            if ($token = $this->apiGuard()->attempt($credentials)) {

                $user = $this->apiGuard()->setToken($token)->authenticate();
                return $this->respondWithToken($token, $user);

            }
            return response()->json([
                'status' => 'failed',
                'message'  => 'Invalid credentials'
            ], 401);

        }

        if ($token = $this->webGuard()->attempt($credentials)) {
            return redirect()->intended(route('home'));
        }
        return back()->with('error', 'Invalid credentials')->withInput();
    }

    public function logout(Request $request)
    {
        if ($request->ajax()) {
            $this->apiGuard()->logout();

            return response()->json([
                'status' => 'success',
                'message'  => 'Logout successfully'
            ], 200);
        }

        $this->webGuard()->logout();
        return back()->with('success', 'Thank you for your time!');
    }

    private function respondWithToken($token, $user)
    {
        return response()->json([
            'user' => $user,
            'token' => $token,
            'type' => 'Bearer',
            'expires_in' => $this->apiGuard()->factory()->getTTL() * 60
        ]);
    }

    private function webGuard()
    {
        return Auth::guard('web');
    }

    private function apiGuard()
    {
        return Auth::guard('api_user');
    }


}
