<?php

namespace App\Http\Controllers\Frontend\Organizer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vendor\Profile\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Image;
use Auth;

class ProfileController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->middleware(function($request, $next) {

            $this->user = Auth::user();

            return $next($request);
        });
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Profile',
                'user' => auth()->user()
            ], 200);
        }
        return view('frontend.organizer.profile.index');
    }

    public function update(ProfileUpdateRequest $request)
    {
        if ($request->isMethod('get')) {
            return view('frontend.organizer.profile.edit');
        }
        $profileData = $request->only('name', 'phone', 'city', 'address', 'country',
            'state', 'description', 'facebook', 'twitter', 'instagram');
        if ($request->hasFile('profile_image')) {
            if ($this->user->profile_image && file_exists('uploads/organizers/' . $this->user->profile_image)) {
                unlink('uploads/organizers/' . $this->user->profile_image);
            }
            $fileName = time() . '.' . $request->file('profile_image')->getClientOriginalExtension();
            Image::make($request->file('profile_image'))->save('uploads/organizers/' . $fileName);
            $profileData['profile_image'] = $fileName;
        }
        $this->user->update($profileData);
        return redirect(route('organizer.profile.index'))->with('success', 'Profile updated successfully');
    }
}
