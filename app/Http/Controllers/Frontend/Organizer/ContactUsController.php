<?php

namespace App\Http\Controllers\Frontend\Organizer;

use App\Model\Message;
use App\Http\Controllers\Controller;
use App\Notifications\Administrator\ContactUsNotification;
use Illuminate\Http\Request;
use Notification;

class ContactUsController extends Controller
{

    public function contactUs(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('frontend.organizer.contact-us.index');
        }

        $data = $this->validate($request, [
            'subject' => 'required',
            'message' => 'required'
        ]);
        $data['name'] = auth()->user()->name . '(Event Organizer)';
        $data['email'] = auth()->user()->email;
        $data['phone'] = auth()->user()->phone;

        $contactMessage = Message::create($data);
        Notification::route('mail', config('app.support_email'))
            ->notify(new ContactUsNotification($contactMessage));

        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Thank you for contacting us. We\'ll respond if necessary'
            ]);
        }

        return back()->with('success', 'Thank you for contacting us. We\'ll respond if necessary');
    }

}
