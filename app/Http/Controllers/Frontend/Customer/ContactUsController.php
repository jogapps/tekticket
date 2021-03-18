<?php

namespace App\Http\Controllers\Frontend\Customer;

use App\Model\Message;
use App\Http\Controllers\Controller;
use App\Notifications\Administrator\ContactUsNotification;
use Illuminate\Http\Request;
use Notification;

class ContactUsController extends Controller
{
    public function showContactUsForm()
    {
        return view('frontend.customer.contact-us');
    }

    public function sendContactUsMessage(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required|string|max:25',
            'phone' => 'nullable',
            'email' => 'required|email:filter',
            'subject' => 'required',
            'message' => 'required'
        ]);
        $contactMessage = Message::create($data);

        Notification::route('mail',config('app.support_email'))
            ->notify(new ContactUsNotification($contactMessage));

        return back()->with('success', 'Thanks you for contacting us');
    }
}
