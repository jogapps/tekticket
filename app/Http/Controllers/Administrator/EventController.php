<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Requests\Administrator\Event\CreateEventRequest;
use App\Model\Category;
use App\Model\Event;
use App\Http\Requests\Administrator\Event\EditEventRequest;
use App\Model\EventPrice;
use App\Model\Organizer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('backend.events.index', compact('events'));
    }

    public function details(Event $event)
    {
        return view('backend.events.details', compact('event'));
    }

    public function edit(EditEventRequest $request, Event $event)
    {
        $categories = Category::get();
        if ($request->isMethod('get')) {
            return view('backend.events.edit', compact('event', 'categories'));
        }
        //Handle post request
        $eventData =   $request->only('title', 'slug', 'category_id', 'event_date',
            'description_raw', 'description', 'street_1', 'street_2', 'city', 'state');
        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            if (file_exists('uploads/events/' . $event->image)) {
                unlink('uploads/events/' . $event->image);
            }
            Image::make($request->file('image'))->save('uploads/events/' . $fileName);
            $eventData['image'] = $fileName;
        }
        $event->update($eventData);
        return redirect(route('backend.events.details', ['event' =>$event]))->with('success', 'Event updated successfully');
    }

    public function create(CreateEventRequest $request)
    {
        $organizers = Organizer::all();
        $categories = Category::all();
        if ($request->isMethod('get')) {
            return view('backend.events.create', compact('organizers', 'categories'));
        }

        $event = new Event;
        $event->title = $request->title;
        $event->slug = $request->slug;
        $event->event_date = $request->event_date;
        $event->description_raw = $request->description_raw;
        $event->description = $request->description;
        $event->street_1 = $request->street_1;
        $event->city = $request->city;
        $event->state = $request->state;
        $event->organizer_id = $request->organizer_id;
        $event->category_id = $request->category_id;
        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            Image::make($request->file('image'))->save('uploads/events/' . $fileName);
            $event->image = $fileName;
        }

        $event->save();

        $ticketsName = $request->ticket_name;
        $ticketsPrice = $request->ticket_price;
        $ticketsCapacity = $request->ticket_available;
        foreach ($ticketsName as $index => $name) {
            $event->prices()->create([
                'title' => $name,
                'amount' =>$ticketsPrice[$index],
                'ticket_available' => $ticketsCapacity[$index]
            ]);
        }

        return redirect(route('backend.events.details', $event))->with('success', 'Event created successfully');
    }

    public function openEvent(Event $event)
    {
        if ($event->event_date < now()) {
            return back()->with('You can\'t open an event whose date has passed, You might need to create another one');
        }

        $event->status = OPEN;
        $event->save();

        return back()->with('success', 'You\'ve successfully opened this event');
    }

    public function closeEvent(Event $event)
    {
        $event->status = CLOSED;
        $event->save();

        return back()->with('success', 'You\'ve successfully closed this event');
    }

    public function stopTicketSales(Event $event)
    {
        $event->ticket_status = CLOSED;
        $event->save();

        $event->prices()->update([
            'is_on_sale' => false
        ]);

        return back()->with('success', 'Ticket sale has been stopped');
    }

    public function startTicketSales(Event $event)
    {
        if ($event->status !== OPEN) {
            return back()->with('error', 'This event is closed already');
        }
        $event->ticket_status = ON_SALE;
        $event->save();

        $event->prices()->update([
            'is_on_sale' => true
        ]);

        return back()->with('success', 'Ticket sale has started');
    }

    public function stopEventPriceSale(EventPrice $eventPrice)
    {
        $eventPrice->is_on_sale = false;
        $eventPrice->save();

        return back()->with('success', 'Sales for this ticket has been stopped');
    }

    public function startEventPriceSale(EventPrice $eventPrice)
    {
        if ($eventPrice->event->event_date < now()) {
            return back()->with('You can\'t start sales of ticket for event whose date has passed.');
        }

        $eventPrice->is_on_sale = true;
        $eventPrice->save();

        return back()->with('success', 'Sales for this ticket has started');
    }

    public function disableEvent(Event $event)
    {
        $event->published = false;
        $event->save();

        return back()->with('success', 'Event disabled successfully');
    }

    public function enableEvent(Event $event)
    {
        $event->published = true;
        $event->save();

        return back()->with('success', 'Event enabled successfully');
    }
}
