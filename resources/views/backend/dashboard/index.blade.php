@extends('backend.layout.default')
@section('title','Dashboard')
@push('page-script')
    <script>
        $("#ticket-table").DataTable();
    </script>
@endpush
@section('body')
    <div class="right_col" role="main">
        <div class="row" style="display: inline-block; width: 100%;">
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-calendar"></i></div>
                        <div class="count">{{ $count['events'] }}</div>
                        <h3>Total Events</h3>
                        <p>No. of total events by organizers</p>
                    </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-users"></i></div>
                        <div class="count">{{ $count['organizers'] }}</div>
                        <h3>Organizers</h3>
                        <p>Total No. of Event Organizers</p>
                    </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-user"></i></div>
                        <div class="count">{{ $count['customers'] }}</div>
                        <h3>Customers</h3>
                        <p>Total No. of Event Customers</p>
                    </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-ticket"></i></div>
                        <div class="count">{{ $count['tickets'] }}</div>
                        <h3>Ticket</h3>
                        <p>Total No. of Tickets Sold</p>
                    </div>
                </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Just Concluded Events <small>(Closed)</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        @forelse($events['closed_events'] as $event)
                            <article class="media event @if(!$loop->last) pb-2 @endif">
                            <a href="{{ route('backend.events.details', $event) }}" class="pull-left date">
                                <p class="month">{{ $event->event_date->format('M') }}</p>
                                <p class="day">{{ $event->event_date->format('d') }}</p>
                            </a>
                            <div class="media-body">
                                <a class="title" href="{{ route('backend.events.details', $event) }}">{{ $event->title }}</a>
                                <p>{{ $event->getLocation() }}</p>
                                <strong>Ticket Sold: {{ $event->soldTickets()->count() }}</strong>
                            </div>
                        </article>
                        @empty
                            <article class="media event">
                                <a href="#" class="pull-left date">
                                    <p class="month">No Date</p>
                                    <p class="day">0</p>
                                </a>
                                <div class="media-body">
                                    <a class="title" href="#">No Closed Event</a>
                                </div>
                            </article>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Newly Created Events <small>(Closed)</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        @forelse($events['open_events'] as $event)
                            <article class="media event @if(!$loop->last) pb-2 @endif">
                            <a href="{{ route('backend.events.details', $event) }}" class="pull-left date">
                                <p class="month">{{ $event->event_date->format('M') }}</p>
                                <p class="day">{{ $event->event_date->format('d') }}</p>
                            </a>
                            <div class="media-body">
                                <a class="title" href="{{ route('backend.events.details', $event) }}">{{ $event->title }}</a>
                                <p>{{ $event->getLocation() }}</p>
                                <strong>Ticket Sold: {{ $event->soldTickets()->count() }}</strong>
                            </div>
                        </article>
                        @empty
                            <article class="media event">
                                <a class="pull-left date">
                                    <p class="month">No Date</p>
                                    <p class="day">0</p>
                                </a>
                                <div class="media-body">
                                    <a class="title" href="#">No Closed Event</a>
                                </div>
                            </article>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h2>Latest Ticket</h2>
                <div class="card-box table-responsive">
                    <table id="ticket-table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Ticket Type</th>
                            <th>Code</th>
                            <th>Customer Name</th>
                            <th>Event Title</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Event Date</th>
                            <th>Purchase Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($latestTicket as $ticket)
                            <tr>
                                <td>{{ $ticket->eventPrice->getTitle() }}</td>
                                <td>{{ $ticket->code }}</td>
                                <td>{{ $ticket->user->name }}</td>
                                <td>{{ $ticket->eventPrice->event->title }}</td>
                                <td>&#8358;{{ number_format($ticket->amount,2)}}</td>
                                <td>{{ $ticket->getStatus() }}</td>
                                <td>{{ $ticket->eventPrice->event->event_date->format('M jS, Y') }}</td>
                                <td>{{ $ticket->created_at->format('M jS, Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">
                                    <button type="button" class="btn btn-default btn-block">
                                        No Ticket has been bought yet
                                    </button>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
