@extends('backend.layout.default')
@section('title','Tickets')
@push('page-script')
    <script>
        $("#pending-table").DataTable();
        $("#used-table").DataTable();
        $("#refund-table").DataTable();
        $("#all-table").DataTable();
    </script>
@endpush
@section('body')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Tickets</h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    @include('backend.includes.alert')
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Tickets<small>List</small></h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="clearfix"></div>
                            <div class="x_content">

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
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane show active" id="pending-tickets" role="tabpanel" aria-labelledby="open-tab">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card-box table-responsive">
                                                    <table id="pending-table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                        <thead>
                                                        <tr>
                                                            <th>Ticket Type</th>
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
                                                                    <td>{{ $ticket->eventPrice->getTitle() }}</td>
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
                                                            <th>Ticket Type</th>
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
                                                                    <td>{{ $ticket->eventPrice->getTitle() }}</td>
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
                                                            <th>Ticket Type</th>
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
                                                                    <td>{{ $ticket->eventPrice->getTitle() }}</td>
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
                                                            <th>Ticket Type</th>
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
                                                                    <td>{{ $ticket->eventPrice->getTitle() }}</td>
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
    </div>
@endsection
