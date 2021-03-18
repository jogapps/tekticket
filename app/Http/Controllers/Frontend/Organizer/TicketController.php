<?php

namespace App\Http\Controllers\Frontend\Organizer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Organizer\Ticket\ValidateTicketRequest;
use App\Model\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(Request $request)
    {
        $tickets = Ticket::latest()->get();

        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Ticket Listing',
                'tickets' => $tickets
            ],200);
        }

        return view('frontend.organizer.tickets.index', compact('tickets'));
    }

    public function validateTicket(ValidateTicketRequest $request)
    {
        $event = auth()->user()->events()->where('id', $request->event)->firstOrFail();

        if ($event->status === CLOSED || !$event->published) {
            return response()->json([
                'status' => 'failed',
                'message' => 'This event is closed, pls contact Administrator for more info'
            ], FOUR_TWO_TWO);
        }

        $ticket = $event->soldTickets()->where('code', $request->ticket)->first();

        if (!$ticket) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Invalid ticket code'
            ], FOUR_TWO_TWO);
        }

        if ($ticket->ticket_status == USED) {
            return response()->json([
                'status' => 'failed',
                'message' => 'TICKET HAS BEEN USED'
            ], FOUR_TWO_TWO);
        }

        if ($ticket->ticket_status === REFUND) {
            return response()->json([
                'status' => 'failed',
                'message' => 'This ticket is no longer valid, money has been refunded back to user wallet'
            ], FOUR_TWO_TWO);
        }

        $ticket->ticket_status = USED;
        $ticket->save();

        //Notify Customer

        return response()->json([
            'status' => 'success',
            'message' => 'TICKET VALIDATION SUCCESSFUL!',
            'tickets_sold' => $event->soldTickets()->count(),
            'pending_tickets' => $event->soldTickets()->pending()->count(),
            'used_tickets' => $event->soldTickets()->used()->count(),
            'refund_tickets' => $event->soldTickets()->refund()->count(),
            'tickets_sold_price' => number_format($event->soldTickets->sum('amount',2),2),
            'pending_tickets_price' => number_format($event->soldTickets->where('ticket_status', PENDING)->sum('amount'),2),
            'used_tickets_price' => number_format($event->soldTickets->where('ticket_status', USED)->sum('amount'),2),
            'refund_tickets_price' => number_format($event->soldTickets->where('ticket_status', REFUND)->sum('amount'),2),
        ], TWO_HUNDRED);

    }
}
