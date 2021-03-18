<?php

namespace App\Http\Controllers\Frontend\Organizer;

use App\Model\Category;
use App\Model\Event;
use App\Http\Controllers\Controller;
use App\Http\Requests\Organizer\Event\CreateEventRequest;
use App\Model\EventPrice;
use Illuminate\Http\Request;
use Image;

class EventController extends Controller
{
    private $organizer;

    public function __construct()
    {
        $this->middleware(function($request, $next) {

            $this->organizer = auth()->user();

            return $next($request);
        });
    }

    public function index(Request $request)
    {
        $events = $this->organizer->events()->with('soldTickets')->orderBy('event_date', 'desc')->get();
        $totalTicketSold = 0;
        foreach ($events as $event) {
            $totalTicketSold += $event->soldTickets()->count();
        }
        $count = [
            'events_created' =>  $this->organizer->events()->count(),
            'upcoming_events' =>  $this->organizer->events()->open()->count(),
            'closed_events' =>  $this->organizer->events()->closed()->count(),
            'total_ticket_sold' => $totalTicketSold
        ];
        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Organizers Events',
                'events' => $events,
                'stats_count' => $count
            ],200);
        }
        return view('frontend.organizer.events.index', compact('events', 'count'));
    }

    public function show(Request $request, Event $event)
    {
        $categories = Category::get();

        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Event Details',
                'event' => $event,
                'categories' => $categories
            ], 200);
        }

        return view('frontend.organizer.events.show', compact('event', 'categories'));
    }

    public function create(CreateEventRequest $request)
    {
        $categories = Category::get();
        if ($request->isMethod('get')) {
            return view('frontend.organizer.events.create', compact('categories'));
        }
        \DB::beginTransaction();

        $eventData = $request->only('title', 'slug', 'category_id', 'event_date',
            'description_raw', 'description', 'street_1', 'organizer_id', 'city', 'state');
        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            Image::make($request->file('image'))->save('uploads/events/' . $fileName);
            $eventData['image'] = $fileName;
        }
        $event = Event::create($eventData);
        $ticketsName = $request->ticket_name;
        $ticketsPrices = $request->ticket_price;
        $ticketsCapacity = $request->ticket_available;
        foreach ($ticketsName as $index => $name) {
            if (!empty($ticketsPrices[$index])) {
                $event->prices()->create([
                    'title' => $name,
                    'amount' => $ticketsPrices[$index],
                    'ticket_available' => $ticketsCapacity[$index] ?? 0
                ]);
            }
        }

        \DB::commit();

        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Event created successfully',
                'event' => $event
            ], 200);
        }

        return redirect(route('organizer.events.show', ['event' => $event]))
            ->with('success', 'Event created successfully');
    }

    public function update(Request $request, Event $event)
    {
        $event->title = $request->title;
        $event->category_id = $request->category_id;
        $event->description_raw = $request->description_raw;
        $event->description = strip_tags($request->description_raw,'<strong></strong>');
        $event->street_1 = $request->street_1;
        $event->city = $request->city;
        $event->state = $request->state;

        if ($request->hasFile('image')) {
            if ($event->image && file_exists('uploads/events/' . $event->image)) {
                unlink('uploads/events/' . $event->image);
            }
            $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            Image::make($request->file('image'))->save('uploads/events/' . $fileName);
            $event->image = $fileName;
        }

        $event->save();

        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Event updated successfully',
                'event' => $event
            ], 200);
        }

        return back()->with('success', 'Event updated successfully');
    }

    public function stopTicketSales(Request $request, Event $event)
    {
        $event->ticket_status = CLOSED;
        $event->save();

        $event->prices()->update([
            'is_on_sale' => false
        ]);

        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Ticket sale has been stopped',
                'event' => $event
            ], 200);
        }

        return back()->with('success', 'Ticket sale has been stopped');
    }

    public function startTicketSales(Request $request, Event $event)
    {
        if ($event->status !== OPEN) {

            if ($request->ajax()) {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'This event is closed already',
                    'event' => $event
                ], 422);
            }

            return back()->with('error', 'This event is closed already');
        }

        $event->ticket_status = ON_SALE;
        $event->save();

        $event->prices()->update([
            'is_on_sale' => true
        ]);

        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Ticket sale has started',
                'event' => $event
            ], 200);
        }

        return back()->with('success', 'Ticket sale has started');
    }

    public function openEvent(Request $request, Event $event)
    {
        if ($event->event_date < now()) {

            if ($request->ajax()) {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'You can\'t open an event whose date has passed, You might need to create another one',
                    'event' => $event
                ], 422);
            }

            return back()->with('error', 'You can\'t open an event whose date has passed, You might need to create another one');
        }

        $event->status = OPEN;
        $event->save();

        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'You\'ve successfully opened this event',
                'event' => $event
            ], 200);
        }

        return back()->with('success', 'You\'ve successfully opened this event');
    }

    public function closeEvent(Request $request, Event $event)
    {
        $event->status = CLOSED;
        $event->save();

        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'You\'ve successfully closed this event',
                'event' => $event
            ], 200);
        }

        return back()->with('success', 'You\'ve successfully closed this event');
    }

    public function stopEventPriceSale(Request $request, EventPrice $eventPrice)
    {
        $eventPrice->is_on_sale = false;
        $eventPrice->save();

        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Sales for this ticket has been stopped',
                'event_price' => $eventPrice
            ], 200);
        }

        return back()->with('success', 'Sales for this ticket has been stopped');
    }

    public function startEventPriceSale(Request $request, EventPrice $eventPrice)
    {
        if ($eventPrice->event->event_date < now()) {

            if ($request->ajax()) {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'You can\'t start sales of ticket for event whose date has passed.',
                    'event_price' => $eventPrice
                ], 422);
            }

            return back()->with('You can\'t start sales of ticket for event whose date has passed.');
        }

        $eventPrice->is_on_sale = true;
        $eventPrice->save();

        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Sales for this ticket has started',
                'event_price' => $eventPrice
            ], 200);
        }

        return back()->with('success', 'Sales for this ticket has started');
    }
}
