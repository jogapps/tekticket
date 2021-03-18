<?php

namespace App\Http\Controllers\Frontend\Organizer;

use App\Http\Controllers\Controller;
use App\Model\EventPrice;
use App\Model\Ticket;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $pricesId = EventPrice::whereIn('event_id', auth()->user()->events()->pluck('id'))->pluck('id');
        $ticketsSold = Ticket::whereIn('event_price_id', $pricesId);
        $count = [
            'total_event_created' => auth()->user()->events()->count(),
            'total_tickets_sold' => $ticketsSold->count(),
            'total_used_tickets' => $ticketsSold->used()->count(),
            'total_tickets_refund' => $ticketsSold->refund()->count(),
        ];
        $latestEvent = auth()->user()->events()->orderBy('event_date', 'asc')->open()->first();
        if (!$latestEvent) {
            $latestEvent = auth()->user()->events()->orderBy('event_date', 'asc')->closed()->first();
        }
        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'stats_count' => $count,
                'latest_event' => $latestEvent
            ]);
        }
        return view('frontend.organizer.dashboard.index', compact('count', 'latestEvent'));
    }
}
