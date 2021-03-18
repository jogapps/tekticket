<?php

namespace App\Http\Controllers\Administrator;

use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('backend.users.index',compact('users'));
    }

    public function show(User $user)
    {
        return view('backend.users.show',compact('user'));
    }
}
