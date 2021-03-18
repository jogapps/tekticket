<?php

namespace App\Http\Controllers\Frontend\Customer;

use App\Model\Event;
use App\Http\Requests\Customer\ProfileUpdateRequest;
use App\Http\Controllers\Controller;
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
                'message' => 'Profile',
                'status' => 'success',
                'profile' => $request->user(),
            ]);
        }
        $favoriteEvents = Event::inRandomOrder()->limit(3)->get();
        return view('frontend.customer.profile.index', compact('favoriteEvents'));
    }

    public function edit()
    {
        return view('frontend.customer.profile.edit');
    }

    public function update(ProfileUpdateRequest $request)
    {
        $data = $request->only('name', 'address', 'country', 'state', 'city', 'phone');
        if ($request->hasFile('profile_image')) {
            $fileName = time() . '.' . $request->file('profile_image')->getClientOriginalExtension();
            Image::make($request->file('image'))->save('uploads/users/' . $fileName);
            $data['profile_image'] = $fileName;
        }
        $this->user->update($data);

        if ($request->ajax()) {
            return response()->json([
                'message' => 'Profile updated message',
                'status' => 'success',
                'profile' => $request->user()
            ]);
        }

        return redirect(route('profile.index'))->with('success', 'Profile updated successfully');
    }

    public function voucherLog()
    {
        $transactions = auth()->user()->giftVoucher->transactions()->get();
        return view('frontend.customer.profile.wallet-and-voucher', compact('transactions'));
    }
}
