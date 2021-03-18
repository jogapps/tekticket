<?php

namespace App\Http\Controllers\Frontend\Organizer\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Organizer\Auth\LoginRequest;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:organizer')->except('logout');
        $this->middleware('guest:api_organizer')->except('logout');
    }

    public function login(LoginRequest $request)
    {
        if ($request->isMethod('get')) {
            return view('frontend.organizer.auth.login');
        }
        $credentials = $request->only('email', 'password');
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
        if ($this->webGuard()->attempt($credentials)) {
            return redirect()->intended(route('organizer.dashboard'));
        }
        return back()->with('error','Invalid credentials')->withInput();
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
        return back();
    }

    public function webGuard()
    {
        return Auth::guard('organizer');
    }

    public function apiGuard()
    {
        return Auth::guard('api_organizer');
    }
}
