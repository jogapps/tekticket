<?php

namespace App\Http\Controllers\Administrator;

use App\Model\Administrator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdministratorController extends Controller
{
    public function index()
    {
        $administrators = Administrator::all();
        return view('backend.administrators.index',compact('administrators'));
    }

    public function create(Request $request)
    {
        $data = $this->validate($request,[
           'name' => 'required',
           'email' => 'required|email|unique:administrators',
           'password' => 'required|confirmed|min:6',
        ]);

        $data['password'] = bcrypt($request->password);
        Administrator::create($data);
        return back()->with('success','Administrator created successfully');
    }

    public function delete(Request $request)
    {
        Administrator::destroy($request->id);
        return back()->with('success','Administrator deleted successfully');
    }
}
