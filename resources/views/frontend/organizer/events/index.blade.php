@extends('frontend.organizer.layout.default')
@section('title', 'Events')
@section('events-index-active', 'active')
@push('page-script')
    <script>
        $('#event-list').DataTable({
            columnDefs: [{
                targets: [0],
                orderData: [0, 1]
            }, {
                targets: [1],
                orderData: [1, 0]
            }, {
                targets: [4],
                orderData: [4, 0]
            }]
        });

    </script>
@endpush
@section('body')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget">
                        <div class="widget-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="state">
                                    <h6>Events Created</h6>
                                    <h2>{{ $count['events_created'] }}</h2>
                                </div>
                                <div class="icon">
                                    <i class="ik ik-calendar"></i>
                                </div>
                            </div>
                            <small class="text-small mt-10 d-block">You've created {{ count($events) }} Event(s)</small>
                        </div>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 62%;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget">
                        <div class="widget-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="state">
                                    <h6>Upcoming Events</h6>
                                    <h2>{{ $count['upcoming_events'] }}</h2>
                                </div>
                                <div class="icon">
                                    <i class="ik ik-thumbs-up"></i>
                                </div>
                            </div>
                            <small class="text-small mt-10 d-block">You have {{ count($events) }} upcoming events</small>
                        </div>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget">
                        <div class="widget-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="state">
                                    <h6>Passed Events</h6>
                                    <h2>{{ $count['closed_events'] }}</h2>
                                </div>
                                <div class="icon">
                                    <i class="ik ik-calendar"></i>
                                </div>
                            </div>
                            <small class="text-small mt-10 d-block">Total Passed Events</small>
                        </div>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100" style="width: 31%;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget">
                        <div class="widget-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="state">
                                    <h6>Total Ticket Sold</h6>
                                    <h2>{{ $count['total_ticket_sold'] }}</h2>
                                </div>
                                <div class="icon">
                                    <i class="ik ik-message-square"></i>
                                </div>
                            </div>
                            <small class="text-small mt-10 d-block">Total Ticket Sold</small>
                        </div>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-block">
                            <h3>Events</h3>
                        </div>
                        <div class="card-body">
                            <div class="dt-responsive">
                                <table id="event-list"
                                       class="table table-striped table-bordered nowrap">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Event date</th>
                                        <th>Location</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Ticket status</th>
                                        <th>Ticket sold</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($events as $event)
                                        <tr>
                                            <td>{{ $event->title }}</td>
                                            <td>{{ $event->event_date }}</td>
                                            <td>{{ $event->city }}</td>
                                            <td>{{ $event->category->name }}</td>
                                            <td>{{ $event->status }}</td>
                                            <td>{{ $event->ticket_status }}</td>
                                            <td>{{ $event->soldTickets()->count() }}</td>
                                            <td><a href="{{ route('organizer.events.show',['event' => $event]) }}" class="btn btn-info btn-sm">Details <i class="fa fa-arrow-right"></i></a> </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">No Events</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
