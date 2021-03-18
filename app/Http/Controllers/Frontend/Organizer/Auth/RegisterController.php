<?php

namespace App\Http\Controllers\Frontend\Organizer\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Organizer\Auth\RegisterRequest;
use App\Model\Organizer;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        if ($request->isMethod('get')) {
            return view('frontend.organizer.auth.register');
        }
        $organizerData = $request->only('name', 'email', 'phone');
        $organizerData['password'] = bcrypt($request->password);
        $organizer = Organizer::create($organizerData);
        $organizer->sendEmailVerificationNotification();
        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Registration successful, Pls check your email for verification'
            ]);
        }
        return redirect(route('organizer.login'))->with('success', 'Registration successful, Pls check your email for verification.');
    }
}
