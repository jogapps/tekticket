<?php

namespace App\Http\Controllers\Frontend\Customer;

use App\Http\Controllers\Controller;
use App\Model\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $this->validate($request, [
           'email' => 'required|email:filter'
        ]);
        $subscriber = Newsletter::firstOrNew(['email' => $request->email]);
        $subscriber->save();
        return back()->with('success', 'Thank you for subscribing to our newsletter');
    }

    public function unSubscribe(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email:filter|exists:newsletters'
        ]);
        Newsletter::where('email', $request->email)->delete();
        return back()->with('success', 'You have unsubscribed from our newsletter');
    }
}
