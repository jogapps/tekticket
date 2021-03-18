@extends('backend.layout.default')
@section('title','Events details')
@push('page-script')
    <script>
        $("#ticket-table").DataTable();
    </script>
@endpush
@section('body')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><small>Event details</small></h3>
            </div>
            <div class="title_right text-right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <a href="{{ route('backend.events.index') }}" class="btn btn-outline-info"><i class="fa fa-arrow-left"></i> Back To Events</a>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        @include('backend.includes.alert')
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <a href="{{ route('backend.events.edit', ['event' => $event]) }}" class="btn pull-right btn-warning btn-sm">Edit Event <i class="fa fa-edit"></i></a>
                        <h2>{{ $event->title }}:
                            @if($event->published)
                                <span class="text-success text-right">PUBLISHED</span>
                            @else
                                <span class="text-danger text-right">DISABLED</span>
                            @endif
                        </h2>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <div class="col-md-9 col-sm-9  ">

                            <ul class="stats-overview">
                                <li>
                                    <span class="name">Event Date</span>
                                    <span class="value text-success">{{ $event->event_date->format('M jS, Y') }}</span>
                                </li>
                                <li>
                                    <span class="name">Event Location</span>
                                    <span class="value text-success"> {{ $event->city }}, {{ $event->state }} </span>
                                </li>
                                <li class="hidden-phone">
                                    <span class="name">Address</span>
                                    <span class="value text-success"> {{ $event->street_1 }} </span>
                                </li>
                            </ul>
                            <br />

                            <div class="row">
                                <div class="col-md-6">
                                    <div id="" style="min-height:250px;">
                                        <img class="img-fluid" src="{{ asset('uploads/events/' . $event->getImage()) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-group">
                                        <li class="list-group-item list-group-item-secondary">Event Status: <span class="float-right"> {{ $event->status }}</span></li>
                                        <li class="list-group-item list-group-item-secondary">Ticket Status: <span class="float-right"> {{ $event->ticket_status }}</span></li>
                                        <li class="list-group-item list-group-item-secondary">Event Category: <span class="float-right"> {{ $event->category->name }}</span></li>
                                        <li class="list-group-item list-group-item-secondary">Event Menu: <span class="float-right"> {{ $event->category->menu->name }}</span></li>
                                        <li class="list-group-item list-group-item-secondary">Created At: <span class="float-right"> {{ $event->created_at->format('M jS, Y') }}</span></li>
                                        <li class="list-group-item list-group-item-secondary">Event Action: <span class="float-right">
                                                 @if($event->status === CLOSED)
                                                <a href="{{ route('backend.events.open', $event) }}" class="btn btn-sm btn-outline-success">Open Event <i class="fa fa-check"></i></a>
                                                @else
                                                <a href="{{ route('backend.events.close', $event) }}" class="btn btn-sm btn-outline-danger">Close Event <i class="fa fa-stop-circle"></i></a>
                                                @endif
                                            </span>
                                        </li>
                                        <li class="list-group-item list-group-item-secondary">Ticket Action: <span class="float-right">
                                                @if($event->ticket_status === ON_SALE)
                                                    <a href="{{ route('backend.events.stop.all.ticket.sales', $event) }}" class="btn btn-sm btn-outline-danger"> Stop Sale <i class="fa fa-stop-circle"></i></a>
                                                @else
                                                    <a href="{{ route('backend.events.start.all.ticket.sales', $event) }}" class="btn btn-sm btn-outline-success"> Start Sale <i class="fa fa-check"></i></a>
                                                @endif
                                            </span>
                                        </li>
                                        <li class="list-group-item list-group-item-secondary"> Disable / Enable:
                                            <span class="float-right">
                                                @if ($event->published)
                                                    <a class="btn btn-outline-danger btn-sm" href="{{ route('backend.events.disable', $event) }}"> Disable <i class="fa fa-ban"></i></a>
                                                @else
                                                    <a class="btn btn-outline-success btn-sm" href="{{ route('backend.events.enable', $event) }}"> Enable <i class="fa fa-check"></i></a>
                                                @endif
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- start project-detail sidebar -->
                        <div class="col-md-3 col-sm-3  ">

                            <section class="panel">

                                <div class="x_title">
                                    <h2>Organizer Details</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="panel-body">
                                    <h3 class="green">{{ $event->organizer->name }}</h3>

                                    <div class="project_detail">

                                        <p class="title">Phone Number :</p>
                                        <p>{{ $event->organizer->phone ?? 'Not Provided' }}</p>
                                        <p class="title">Email :</p>
                                        <p>{{ $event->organizer->email ?? 'Not Provided' }}</p>
                                        <p class="title">Address :</p>
                                        <p>{{ $event->organizer->address ?? 'Not Provided' }}</p>
                                    </div>
                                    <div class=" mtop20">
                                        <a href="#" class="btn btn-sm btn-outline-info">Go to Organizers Page <i class="fa fa-arrow-right"></i></a>
                                    </div>

                                </div>

                            </section>

                        </div>
                        <!-- end project-detail sidebar -->
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Event Prices <small>statistics</small></h2>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                <tr class="headings">
                                    <th class="column-title">Title </th>
                                    <th class="column-title">Available Ticket (Value / Per unit)</th>
                                    <th class="column-title">Sold Ticket (Value) </th>
                                    <th class="column-title">Used Ticket (Value) </th>
                                    <th class="column-title">Unused Ticket (Value) </th>
                                    <th class="column-title">Refund Ticket (Value) </th>
                                    <th class="column-title">Total Ticket Value </th>
                                    <th class="column-title">Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($event->prices()->orderBy('id', 'desc')->get() as $price)
                                    <tr class="@if($loop->even) even @else odd @endif pointer">
                                    <td class=" ">{{ $price->getTitle() }}</td>
                                    <td class=" ">{{ $price->is_unlimited ? 'Unlimited' : $price->ticket_available }} (&#8358;{{ number_format($price->amount, 2) }})</td>
                                    <td class=" "> {{ $price->soldTickets()->count() }} (&#8358;{{ number_format($price->soldTickets()->used()->sum('amount'),2) }})</td>
                                    <td class=" "> {{ $price->soldTickets()->used()->count() }} (&#8358;{{ number_format($price->soldTickets()->used()->sum('amount'),2) }})</td>
                                    <td class=" "> {{ $price->soldTickets()->pending()->count() }} (&#8358;{{ number_format($price->soldTickets()->pending()->sum('amount'),2) }})</td>
                                    <td class=" "> {{ $price->soldTickets()->refund()->count() }} (&#8358;{{ number_format($price->soldTickets()->refund()->sum('amount'), 2) }})</td>
                                    <td class=" ">&#8358;{{ number_format($price->amount * $price->ticket_available,2) }}</td>
                                    <td>
                                        @if ($price->isOnSale())
                                            <a href="{{ route('backend.events.stop.event.price.sales', $price) }}" class="btn btn-sm btn-outline-danger">Stop Sales <i class="fa fa-stop-circle"></i></a>
                                        @else
                                            <a href="{{ route('backend.events.start.event.price.sales', $price) }}" class="btn btn-sm btn-outline-success">Start Sales <i class="fa fa-check"></i></a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <div class="row">
                            <div class="col-md-3">
                                <h2>Tickets Sold ({{ $event->soldTickets()->count() }}: &#8358;{{ number_format($event->soldTickets->sum('amount'), 2) }})</h2>
                            </div>
                            <div class="col-md-9 text-right">
                                <h6>
                                    Used Ticket: ({{ $event->soldTickets()->used()->count() }}: &#8358;{{ number_format($event->soldTickets->where('ticket_status', USED)->sum('amount'),2) }}) &nbsp;&nbsp;
                                    Pending Ticket: ({{ $event->soldTickets()->pending()->count() }}: &#8358;{{ number_format($event->soldTickets->where('ticket_status', PENDING)->sum('amount'),2) }}) &nbsp;&nbsp;
                                    Refund Ticket: ({{ $event->soldTickets()->refund()->count() }}: &#8358;{{ number_format($event->soldTickets->where('ticket_status', REFUND)->sum('amount'),2) }})
                                </h6>
                            </div>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="card-box table-responsive">
                            <table id="ticket-table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Ticket Type</th>
                                    <th>Code</th>
                                    <th>Status</th>
                                    <th>Customer Name</th>
                                    <th>Amount</th>
                                    <th>Purchase Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($event->soldTickets as $ticket)
                                    <tr>
                                        <td>{{ $ticket->eventPrice->getTitle() }}</td>
                                        <td>{{ $ticket->code }}</td>
                                        <td>{{ ucfirst($ticket->ticket_status) }}</td>
                                        <td>{{ $ticket->user->name }}</td>
                                        <td>&#8358;{{ number_format($ticket->amount,2)}}</td>
                                        <td>{{ $ticket->created_at->format('M jS, Y') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6"><button class="btn btn-default btn-block">No Ticket Sold</button> </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
<!-- /page content -->
@endsection
