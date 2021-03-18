<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Model\OtherInformation;
use Illuminate\Http\Request;

class OtherInformationController extends Controller
{
    public function index()
    {
        $information = OtherInformation::first();
        return view('backend.other-information.index', compact('information'));
    }

    public function update(Request $request)
    {
        $data = $this->validate($request, [
            'email' => 'required|email',
            'phone_1' => 'required',
            'phone_2' => 'nullable',
            'facebook' => 'nullable',
            'instagram' => 'nullable',
            'twitter' => 'nullable',
        ]);
        $information = OtherInformation::first();
        $information->update($data);
        return back()->with('success', 'Information updated successfully');
    }
}
