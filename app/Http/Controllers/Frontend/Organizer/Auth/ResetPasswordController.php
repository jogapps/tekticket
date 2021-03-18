<?php

namespace App\Http\Controllers\Frontend\Organizer\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{

    public function __construct()
    {
       // dd('hey');
    }

    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    protected function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ];
    }

    protected function sendResetResponse(Request $request, $response)
    {
        if ($request->wantsJson()) {
            return new JsonResponse(['message' => trans($response)], 200);
        }

        return redirect(route('organizer.login'))
            ->with('status', trans($response));
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('frontend.organizer.auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    protected function guard()
    {
        return Auth::guard('organizer');
    }

    public function broker()
    {
        return Password::broker('organizers');
    }


}
