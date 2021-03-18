@extends('backend.layout.default')
@section('title','Events')
@push('page-script')
    <script>
        $("#open-table").DataTable();
        $("#closed-table").DataTable();
        $("#all-table").DataTable();
        $("#disabled-table").DataTable();
    </script>
@endpush
@section('body')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Events</h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    @include('backend.includes.alert')
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Event<small>List</small></h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="clearfix"></div>
                            <div class="x_content">

                                <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="open-tab" data-toggle="tab" href="#open-events" role="tab" aria-controls="list" aria-selected="true">Open Events</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="closed-tab" data-toggle="tab" href="#closed-events" role="tab" aria-controls="list" aria-selected="true">Closed Events</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="all-tab" data-toggle="tab" href="#all-events" role="tab" aria-controls="list" aria-selected="true">All Events</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="disabled-tab" data-toggle="tab" href="#disabled-events" role="tab" aria-controls="list" aria-selected="true">Disabled Events</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane show active" id="open-events" role="tabpanel" aria-labelledby="open-tab">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card-box table-responsive">
                                                    <table id="open-table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                        <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Organizer</th>
                                                            <th>Ticket sold</th>
                                                            <th>Event date</th>
                                                            <th>Status</th>
                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($events as $event)
                                                            @if ($event->status === OPEN)
                                                                <tr>
                                                                    <td>{{ $event->title }}</td>
                                                                    <td>{{ $event->organizer->name }}</td>
                                                                    <td>{{ $event->soldTickets()->count() }}</td>
                                                                    <td>{{ $event->event_date->format('F jS, Y') }}</td>
                                                                    <td>{{ $event->getStatus() }}</td>
                                                                    <td>
                                                                        <a href="{{ route('backend.events.details',$event) }}">Details <i class="fa fa-arrow-right"></i></a>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="closed-events" role="tabpanel" aria-labelledby="closed-tab">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card-box table-responsive">
                                                    <table id="closed-table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                        <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Organizer</th>
                                                            <th>Ticket sold</th>
                                                            <th>Event date</th>
                                                            <th>Status</th>
                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($events as $event)
                                                            @if ($event->status === CLOSED)
                                                                <tr>
                                                                    <td>{{ $event->title }}</td>
                                                                    <td>{{ $event->organizer->name }}</td>
                                                                    <td>{{ $event->soldTickets()->count() }}</td>
                                                                    <td>{{ $event->event_date->format('F jS, Y') }}</td>
                                                                    <td>{{ $event->getStatus() }}</td>
                                                                    <td>
                                                                        <a href="{{ route('backend.events.details',$event) }}">Details <i class="fa fa-arrow-right"></i></a>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="all-events" role="tabpanel" aria-labelledby="all-tab">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card-box table-responsive">
                                                    <table id="all-table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                        <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Organizer</th>
                                                            <th>Ticket sold</th>
                                                            <th>Event date</th>
                                                            <th>Status</th>
                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($events as $event)
                                                            <tr>
                                                                <td>{{ $event->title }}</td>
                                                                <td>{{ $event->organizer->name }}</td>
                                                                <td>{{ $event->soldTickets()->count() }}</td>
                                                                <td>{{ $event->getStatus() }}</td>
                                                                <td>{{ $event->event_date->format('F jS, Y') }}</td>
                                                                <td>
                                                                    <a href="{{ route('backend.events.details',$event) }}">Details <i class="fa fa-arrow-right"></i></a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="disabled-events" role="tabpanel" aria-labelledby="disabled-tab">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card-box table-responsive">
                                                    <table id="disabled-table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                        <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Organizer</th>
                                                            <th>Ticket sold</th>
                                                            <th>Event date</th>
                                                            <th>Status</th>
                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($events as $event)
                                                            @if(!$event->published)
                                                                <tr>
                                                                    <td>{{ $event->title }}</td>
                                                                    <td>{{ $event->organizer->name }}</td>
                                                                    <td>{{ $event->soldTickets()->count() }}</td>
                                                                    <td>{{ $event->getStatus() }}</td>
                                                                    <td>{{ $event->event_date->format('F jS, Y') }}</td>
                                                                    <td>
                                                                        <a href="{{ route('backend.events.details',$event) }}">Details <i class="fa fa-arrow-right"></i></a>
                                                                    </td>
                                                                </tr>
                                                            @endif
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
