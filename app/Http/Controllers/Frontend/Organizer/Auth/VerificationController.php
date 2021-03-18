<?php

namespace App\Http\Controllers\Frontend\Organizer\Auth;

use App\Http\Controllers\Controller;
use App\Model\Organizer;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function verifyEmail(Request $request)
    {
        $organizer = Organizer::findOrFail($request->id);
        $organizer->email_verified_at = now()->format('Y-m-d g:i:s');
        $organizer->save();
        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Email verified successfully.'
            ], 200);
        }
        return redirect(route('organizer.login'))->with('success', 'Email verified successfully');
    }

    public function resendVerification(Request $request)
    {
        $organizer = Organizer::where('email', $request->email)->firstOrFail();
        $organizer->sendEmailVerificationNotification();
        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Pls check your email for verification.'
            ], 200);
        }
        return back()->with('success', 'Pls check your email for verification.');
    }
}
