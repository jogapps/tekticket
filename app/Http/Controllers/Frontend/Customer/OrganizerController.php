<?php

namespace App\Http\Controllers\Frontend\Customer;

use App\Http\Controllers\Controller;
use App\Model\Organizer;
use Illuminate\Http\Request;

class OrganizerController extends Controller
{
    public function showProfile(Organizer $organizer)
    {
        return view('frontend.customer.organizer-page', compact('organizer'));
    }
}
