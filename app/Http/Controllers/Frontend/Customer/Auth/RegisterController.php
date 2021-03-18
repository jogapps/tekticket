<?php

namespace App\Http\Controllers\Frontend\Customer\Auth;

use App\Http\Requests\Auth\RegisterRequest;
use App\Model\User;
use App\Http\Controllers\Controller;
use Illuminate\Database\ConnectionInterface as DB;
use Auth;

class RegisterController extends Controller
{
    private $db;

    public function __construct(DB $db)
    {
        $this->middleware('guest:web');
        $this->db = $db;
    }

    public function register(RegisterRequest $request)
    {
        if ($request->isMethod('get')) {
            return view('frontend.customer.auth.register');
        }

        $this->db->beginTransaction();

        $userData = $request->only('name', 'email', 'address','country', 'state', 'city', 'phone');
        $userData['password'] = bcrypt($request->password);
        $user = User::create($userData);

        $this->db->commit();

        Auth::guard('web')->login($user);
        return redirect(route('home'))->with('success', 'Welcome to TekTicket, Pls verify your email');
    }

}
