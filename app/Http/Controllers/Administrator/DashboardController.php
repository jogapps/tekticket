<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Model\Administrator;
use App\Model\Event;
use App\Model\Organizer;
use App\Model\Ticket;
use App\Model\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $count = [
            'events' => Event::count(),
            'customers' => User::count(),
            'organizers' => Organizer::count(),
            'tickets' => Ticket::count(),
        ];
        $events = [
          'closed_events' => Event::orderBy('event_date', 'desc')->closed()->limit(5)->get(),
          'open_events' => Event::orderBy('event_date', 'desc')->open()->limit(5)->get()
        ];
        $latestTicket = Ticket::latest()->get();
        return view('backend.dashboard.index', compact('count', 'events', 'latestTicket'));
    }
}
