@extends('frontend.organizer.layout.default')
@section('title', 'Events')
@section('tickets-sold-active', 'active')
@push('page-script')
    <script>
       $("#pending-table").DataTable();
       $("#used-table").DataTable();
       $("#refund-table").DataTable();
       $("#all-table").DataTable();
    </script>
@endpush
@section('body')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-block">
                            <h3>Events</h3>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="open-tab" data-toggle="tab" href="#pending-tickets" role="tab" aria-controls="list" aria-selected="true">Pending Tickets</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="closed-tab" data-toggle="tab" href="#used-tickets" role="tab" aria-controls="list" aria-selected="true">Used Tickets</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="all-tab" data-toggle="tab" href="#refund-tickets" role="tab" aria-controls="list" aria-selected="true">Refund Tickets</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="disabled-tab" data-toggle="tab" href="#all-tickets" role="tab" aria-controls="list" aria-selected="true">All Tickets</a>
                                </li>
                            </ul>
                            <div class="tab-content mt3" id="myTabContent">
                                <div class="tab-pane show active" id="pending-tickets" role="tabpanel" aria-labelledby="open-tab">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card-box table-responsive">
                                                <table id="pending-table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th class="text-center">Ticket Type</th>
                                                        <th>Code</th>
                                                        <th>Customer Name</th>
                                                        <th>Event Title</th>
                                                        <th>Amount</th>
                                                        <th>Event Date</th>
                                                        <th>Purchase Date</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($tickets as $ticket)
                                                        @if ($ticket->ticket_status === PENDING)
                                                            <tr>
                                                                <td class="text-center">{{ $ticket->eventPrice->getTitle() }}</td>
                                                                <td>{{ $ticket->code }}</td>
                                                                <td>{{ $ticket->user->name }}</td>
                                                                <td>{{ $ticket->eventPrice->event->title }}</td>
                                                                <td>&#8358;{{ number_format($ticket->amount,2)}}</td>
                                                                <td>{{ $ticket->eventPrice->event->event_date->format('M jS, Y') }}</td>
                                                                <td>{{ $ticket->created_at->format('M jS, Y') }}</td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="used-tickets" role="tabpanel" aria-labelledby="closed-tab">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card-box table-responsive">
                                                <table id="used-table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th class="text-center">Ticket Type</th>
                                                        <th>Code</th>
                                                        <th>Customer Name</th>
                                                        <th>Event Title</th>
                                                        <th>Amount</th>
                                                        <th>Event Date</th>
                                                        <th>Purchase Date</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($tickets as $ticket)
                                                        @if ($ticket->ticket_status === USED)
                                                            <tr>
                                                                <td class="text-center">{{ $ticket->eventPrice->getTitle() }}</td>
                                                                <td>{{ $ticket->code }}</td>
                                                                <td>{{ $ticket->user->name }}</td>
                                                                <td>{{ $ticket->eventPrice->event->title }}</td>
                                                                <td>&#8358;{{ number_format($ticket->amount,2)}}</td>
                                                                <td>{{ $ticket->eventPrice->event->event_date->format('M jS, Y') }}</td>
                                                                <td>{{ $ticket->created_at->format('M jS, Y') }}</td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="refund-tickets" role="tabpanel" aria-labelledby="all-tab">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card-box table-responsive">
                                                <table id="refund-table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th class="text-center">Ticket Type</th>
                                                        <th>Code</th>
                                                        <th>Customer Name</th>
                                                        <th>Event Title</th>
                                                        <th>Amount</th>
                                                        <th>Event Date</th>
                                                        <th>Purchase Date</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($tickets as $ticket)
                                                        @if ($ticket->ticket_status === REFUND)
                                                            <tr>
                                                                <td class="text-center">{{ $ticket->eventPrice->getTitle() }}</td>
                                                                <td>{{ $ticket->code }}</td>
                                                                <td>{{ $ticket->user->name }}</td>
                                                                <td>{{ $ticket->eventPrice->event->title }}</td>
                                                                <td>&#8358;{{ number_format($ticket->amount,2)}}</td>
                                                                <td>{{ $ticket->eventPrice->event->event_date->format('M jS, Y') }}</td>
                                                                <td>{{ $ticket->created_at->format('M jS, Y') }}</td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="all-tickets" role="tabpanel" aria-labelledby="disabled-tab">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card-box table-responsive">
                                                <table id="all-table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th class="text-center">Ticket Type</th>
                                                        <th>Code</th>
                                                        <th>Customer Name</th>
                                                        <th>Event Title</th>
                                                        <th>Amount</th>
                                                        <th>Event Date</th>
                                                        <th>Purchase Date</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($tickets as $ticket)
                                                        <tr>
                                                            <td class="text-center">{{ $ticket->eventPrice->getTitle() }}</td>
                                                            <td>{{ $ticket->code }}</td>
                                                            <td>{{ $ticket->user->name }}</td>
                                                            <td>{{ $ticket->eventPrice->event->title }}</td>
                                                            <td>&#8358;{{ number_format($ticket->amount,2)}}</td>
                                                            <td>{{ $ticket->eventPrice->event->event_date->format('M jS, Y') }}</td>
                                                            <td>{{ $ticket->created_at->format('M jS, Y') }}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
