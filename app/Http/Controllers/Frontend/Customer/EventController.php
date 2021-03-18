<?php

namespace App\Http\Controllers\Frontend\Customer;

use App\Http\Requests\Customer\Event\PurchaseEventTicketRequest;
use App\Model\Event;
use App\Http\Controllers\Controller;
use App\Model\EventPrice;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function listing(Request $request)
    {
        $eventsQuery = Event::with('category','prices');
        if ($request->keyword) {
            $keyword = $request->keyword;
            $eventsQuery->where('title', 'like', '%' . $keyword . '%')
            ->orWhereHas('category', function($query) use ($keyword) {
                $query->where('slug', 'like', '%' . $keyword . '%')
                ->orWhere('name', 'like', '%' . $keyword . '%')
                ->orWhereHas('menu', function ($query) use ($keyword) {
                    $query->where('slug', 'like', '%' . $keyword . '%')
                        ->orWhere('name', 'like', '%' . $keyword . '%');
                });
            });
        }

        $events = $eventsQuery->published()->get();
        $randomEvents = Event::inRandomOrder()
                            ->published()
                            ->limit(EIGHT)
                            ->get();

        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Event Listing',
                'events' => $events,
                'random_events' => $randomEvents
            ]);
        }

        return view('frontend.customer.events.listing', compact('events', 'keyword', 'randomEvents'));
    }

    public function details(Request $request)
    {
        $keyword = $request->slug;
        $event = Event::with('prices')->published()->where('slug', $keyword)
            ->firstOrFail();

        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Event Listing',
                'events' => $event,
            ]);
        }

        return view('frontend.customer.events.details', compact('event'));
    }

    public function checkout(Request $request, Event $event, EventPrice $eventPrice)
    {
        if ($event->ticket_status === CLOSED || $event->isClosed()) {
            return back()->with('error','Ticket cannot be purchase');
        }
        return view('frontend.customer.events.checkout', compact('event', 'eventPrice'));
    }

    public function validateEventTicketPurchase(PurchaseEventTicketRequest $request, Event $event, EventPrice $eventPrice)
    {
        if ($request->quantity < ONE) {
            return response()->json([
                'message' => 'Invalid quantity'
            ],FOUR_TWO_TWO);
        }

        if ($request->quantity > FIVE) {

            return response()->json([
                'message' => "You can't buy more than 5 tickets at a time."
            ],FOUR_TWO_TWO);
        }

        $availableTicketForSale = $eventPrice->ticket_available - $eventPrice->soldTickets()->count();

        if (($request->quantity > $availableTicketForSale) && (!$eventPrice->is_unlimited)) {

            $message = $availableTicketForSale < ONE ?
                'This ticket is no longer available for sales':
                "Only $availableTicketForSale {$eventPrice->getTitle()} ticket(s) is available for sales";

            return response()->json([
                'message' => $message
            ], FOUR_TWO_TWO);

        }

        $customerEWallet =  $request->user()->giftVoucher->balance + $request->user()->wallet->balance;
        $totalAmount = $eventPrice->amount * $request->quantity;
        if ($customerEWallet >= $totalAmount) {
            $amountToPay = ZERO;
        } else {
            $amountToPay = $totalAmount - $customerEWallet;
        }
        $request->session()->put('ticket_quantity', $request->quantity);
        return response()->json([
            'message' => 'Proceed to payment',
            'amount' => $amountToPay * ONE_HUNDRED,
            //'ticket_qty' => $request->quantity,
        ],TWO_HUNDRED);
    }

}
