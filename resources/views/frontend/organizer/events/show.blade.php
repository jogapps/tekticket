@extends('frontend.organizer.layout.default')
@section('title', 'Event details')
@section('events-index-active', 'active')
@push('page-script')
    <script>
        $('.summernote').summernote({
            height: 300,
            tabsize: 2,
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['table', ['table']],
                ['recent', ['recent']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['link', ['link']]
                ['unordered', ['unordered']],
                ['fullscreen',['fullscreen']],
                ['ordered',['ordered']],
            ]
        });
        $("#ticket-sold-table").DataTable()
    </script>
@endpush
@section('body')
    <div class="main-content">
        <div class="container-fluid">
            @include('frontend.customer.includes.alert')
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="ik ik-file-text bg-blue"></i>
                            <div class="d-inline">
                                <h5>Event details</h5>
                                <span>{{ $event->getLocation() }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <nav class="breadcrumb-container" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('organizer.dashboard') }}"><i class="ik ik-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('organizer.events.index') }}">Events</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Details</li>
                            </ol>
                        </nav>
                    </div>
                    @if (!$event->published)
                        <div class="col-md-12 mt-2">
                            <button type="button" class="btn btn-block btn-warning">This Event Has Been Disabled Pls Contact Administrator For More Info.</button>
                        </div>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <strong>EVENT STATUS:
                                @if ($event->status === OPEN)
                                    <button type="button" class="btn btn-success">{{ strtoupper($event->getStatus()) }} <i class="fa fa-check"></i></button>
                                @else
                                    <button type="button" class="btn btn-danger">{{ strtoupper($event->getStatus()) }} <i class="fa fa-stop-circle"></i></button>
                                @endif
                            </strong>
                        </div>
                        <div class="card-body">
                                <form action="{{ route('organizer.tickets.validate') }}" method="post" class="validate-ticket">
                                    @csrf
                                    <input type="hidden" value="{{ $event->id }}" name="event">
                                    <div class="form-group">
                                        <div class="row justify-content-center">
                                            <div class="col-md-12">
                                                <input type="text" name="ticket" class="form-control" required placeholder="Ticket code">
                                            </div>
                                            <div class="col-md-6 mt-1">
                                                <button type="submit" class="btn btn-block btn-outline-success btn-sm">Validate <i class="fa fa-check"></i></button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <h4 class="notify-message text-center text-capitalize"></h4>
                                    </div>
                                </div>
                            <div class="text-center">
                                <img src="{{ $event->image }}" class="rounded-circle" width="150">
                                <h4 class="card-title mt-10">{{ $event->title }}</h4>
                                <p class="card-subtitle text-dark">{{ $event->getLocation() }}</p>
                                <div class="row text-center justify-content-md-center">
                                    <div class="col-6"><a href="javascript:void(0)" class="link"><i class="ik ik-calendar"></i> <font class="font-medium">{{ $event->event_date->format('M jS, Y') }}</font></a></div>
                                </div>
                                <div class="row text-center justify-content-md-center mt-5">
                                    <div class="col-md-12">
                                        <h5>Change Event status</h5>
                                    </div>
                                    <div class="col-12">
                                        @if($event->status === CLOSED)
                                           <a href="{{ route('organizer.events.open', $event) }}" class="btn btn-sm btn-success">Open Event <i class="fa fa-check"></i></a>
                                        @else
                                            <a href="{{ route('organizer.events.close', $event) }}" class="btn btn-sm btn-danger">Close Event <i class="fa fa-stop-circle"></i></a>
                                        @endif
                                    </div>
                                </div>
                                <div class="row text-center justify-content-md-center mt-5">
                                    <div class="col-md-12">
                                        <h5>Change Ticket status</h5>
                                    </div>
                                    <div class="col-12">
                                        @if($event->ticket_status === ON_SALE)
                                            <a href="{{ route('organizer.events.stop.all.ticket.sales', $event) }}" class="btn btn-outline-danger">Stop Ticket sales <i class="fa fa-stop-circle"></i></a>
                                        @else
                                            <a href="{{ route('organizer.events.start.all.ticket.sales', $event) }}" class="btn btn-outline-success">Start Ticket sales <i class="fa fa-check"></i></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="mb-0">
                        <div class="card-body">
                            <small class="text-muted d-block">Category</small>
                            <h6>{{ $event->category->name }}</h6>
                            <small class="text-muted d-block pt-10">Created at</small>
                            <h6>{{ $event->created_at->format('M jS, Y') }}</h6>
                            <br>
                            {{--<button class="btn btn-icon btn-facebook"><i class="fab fa-facebook-f"></i></button>
                            <button class="btn btn-icon btn-twitter"><i class="fab fa-twitter"></i></button>
                            <button class="btn btn-icon btn-instagram"><i class="fab fa-instagram"></i></button>--}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="card">
                        <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-timeline-tab" data-toggle="pill" href="#ticket-stats" role="tab" aria-controls="pills-timeline" aria-selected="true">Ticket Stats</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-timeline-tab" data-toggle="pill" href="#ticket-sold" role="tab" aria-controls="pills-timeline" aria-selected="true">Tickets Sold</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#edit" role="tab" aria-controls="pills-profile" aria-selected="false">Edit</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane show active" id="ticket-stats" role="tabpanel" aria-labelledby="pills-timeline-tab">
                                <div class="card-body">
                                    <div class="p-4">
                                        <div class="row text-center">
                                            <div class="col-6 border-right">
                                                <a href="#" class="link d-flex align-items-center justify-content-center"><i class="ik ik-cpu f-20 mr-5"></i>
                                                    {{ strtoupper('Ticket Status') }}
                                                </a>
                                            </div>
                                            <div class="col-6">
                                                <a href="#" class="link d-flex align-items-center justify-content-center"><i class="ik ik-check-circle f-20 mr-5"></i>
                                                    <strong>{{ strtoupper($event->ticket_status) }}</strong>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="widget">
                                                <div class="widget-body">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="state">
                                                            <h6>Tickets sold</h6>
                                                            <h2>
                                                                <span class="tickets-sold">{{ $event->soldTickets()->count() }}</span>
                                                                (&#8358;<span class="tickets-sold-price">{{ number_format($event->soldTickets->sum('amount'),2) }}</span>)
                                                            </h2>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="ik ik-server"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="widget">
                                                <div class="widget-body">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="state">
                                                            <h6>Pending Tickets</h6>
                                                            <h2>
                                                                <span class="pending-tickets">{{ $event->soldTickets()->pending()->count() }}</span>
                                                                (&#8358;<span class="pending-tickets-price">{{ number_format($event->soldTickets->where('ticket_status', PENDING)->sum('amount'),2) }}</span>)
                                                            </h2>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="ik ik-server"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="widget">
                                                <div class="widget-body">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="state">
                                                            <h6>Used Tickets</h6>
                                                            <h2>
                                                                <span class="used-tickets">{{ $event->soldTickets()->used()->count() }}</span>
                                                                (&#8358;<span class="used-tickets-price">{{ number_format($event->soldTickets->where('ticket_status', USED)->sum('amount'),2) }}</span>)
                                                            </h2>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="ik ik-server"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="widget">
                                                <div class="widget-body">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="state">
                                                            <h6>Refund Tickets</h6>
                                                            <h2>
                                                                <span class="refund-tickets">{{ $event->soldTickets()->refund()->count() }}</span>
                                                                (&#8358;<span class="refund-tickets-price">{{ number_format($event->soldTickets->where('ticket_status', REFUND)->sum('amount'),2) }}</span>)
                                                            </h2>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="ik ik-server"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card-header d-block">
                                                <h3>Ticket Prices</h3>
                                                <span>Your total ticket is valued at
                                                   <strong>&#8358;{{ number_format($event->prices()->sum('amount') ,2) }}</strong>
                                                </span>
                                            </div>
                                            <div class="card-body p-0 table-border-style">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Status</th>
                                                            <th>Title</th>
                                                            <th>Price</th>
                                                            <th>Total Value</th>
                                                            <th>Ticket Available</th>
                                                            <th>Sold</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($event->prices as $price)
                                                            <tr>
                                                                <th scope="row">{{ $loop->iteration }}</th>
                                                                <td>{{ $price->getTitle() }}</td>
                                                                <td>{{ $price->saleStatus() }}</td>
                                                                <td>&#8358;{{ number_format($price->amount,2) }}</td>
                                                                <td>&#8358;{{ number_format($price->amount * $price->ticket_available,2) }}</td>
                                                                <td>{{ $price->is_unlimited ? 'Unlimited' : $price->ticket_available }}</td>
                                                                <td>{{ $price->soldTickets()->count() }}</td>
                                                                <td>
                                                                    @if ($price->isOnSale())
                                                                        <a href="{{ route('organizer.events.stop.event.price.sales', $price) }}" class="btn btn-sm btn-outline-danger">Stop Sales <i class="fa fa-stop-circle"></i></a>
                                                                    @else
                                                                        <a href="{{ route('organizer.events.start.event.price.sales', $price) }}" class="btn btn-sm btn-outline-success">Start Sales <i class="fa fa-check"></i></a>
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
                            </div>
                            <div class="tab-pane fade" id="ticket-sold" role="tabpanel" aria-labelledby="pills-timeline-tab">
                                <div class="row pl-4 pr-4 pt-2">
                                    <div class="col-md-12">
                                        Tickets Sold (<span class="tickets-sold">{{ $event->soldTickets()->count() }}</span>: &#8358;<span class="tickets-sold-price">{{ number_format($event->soldTickets->sum('amount'), 2) }}</span>) &nbsp;&nbsp;
                                        Used Ticket: (<span class="used-tickets">{{ $event->soldTickets()->used()->count() }}</span>: &#8358;<span class="used-tickets-price">{{ number_format($event->soldTickets->where('ticket_status', USED)->sum('amount'),2) }}</span>) &nbsp;&nbsp;
                                        Pending Ticket: (<span class="pending-tickets">{{ $event->soldTickets()->pending()->count() }}</span>: &#8358;<span class="pending-tickets-price">{{ number_format($event->soldTickets->where('ticket_status', PENDING)->sum('amount'),2) }}</span>) &nbsp;&nbsp;
                                        Refund Ticket: (<span class="refund-tickets">{{ $event->soldTickets()->refund()->count() }}</span>: &#8358;<span class="refund-tickets-price">{{ number_format($event->soldTickets->where('ticket_status', REFUND)->sum('amount'),2) }}</span>)
                                    </div>
                                </div>
                                <div class="card-body row justify-content-center">
                                    <div class="card-box col-md-12 table-responsive">
                                        <table id="ticket-sold-table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Ticket Type</th>
                                                <th>Customer Name</th>
                                                <th>Status</th>
                                                <th>Amount</th>
                                                <th>Purchase Date</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($event->soldTickets as $ticket)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{ $ticket->eventPrice->getTitle() }}</td>
                                                    <td>{{ $ticket->user->name }}</td>
                                                    <td>{{ $ticket->getStatus() }}</td>
                                                    <td>&#8358;{{ number_format($ticket->amount,2)}}</td>
                                                    <td>{{ $ticket->created_at->format('M jS, Y') }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6">
                                                        <button type="button" class="btn btn-default btn-block">No Ticket sold</button>
                                                    </td>
                                                </tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="edit" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <div class="card-body">
                                    <form method="post" enctype="multipart/form-data" action="{{ route('organizer.events.update', $event) }}">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-md-6 col-sm-12">
                                                <label for="title">Title</label>
                                                <input type="text" name="title" value="{{ $event->title }}" class="form-control" id="title" placeholder="Event Title" required>
                                                @error('title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <label for="category_id">Category</label>
                                                <select name="category_id" id="category_id" class="form-control" required>
                                                    <option value="">Select category</option>
                                                    @foreach($categories as $category)
                                                        <option @if($event->category_id === $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6 col-sm-12">
                                                <label for="event_date">Event date:</label>
                                                <input type="text" disabled value="{{ $event->event_date->format('M jS, Y') }}" class="form-control" id="event_date" required>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <label for="image">Event Image/Banner: (Optional)</label>
                                                <input type="file" name="image"  class="form-control" id="image" placeholder="Image">
                                                @error('image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12 col-sm-12">
                                                <label for="description_raw">Event description:</label>
                                                <textarea name="description_raw" class="summernote" required>{{ $event->description_raw }}</textarea>
                                                @error('description_raw')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <h5 class="mb-2 mt-5">Event Location</h5>
                                        <div class="form-group row">
                                            <div class="col-md-12 col-sm-12">
                                                <label for="street_1">Address Line 1</label>
                                                <input type="text" name="street_1" value="{{ $event->street_1 }}" class="form-control" id="street_1" placeholder="Address line 1" required>
                                                @error('street_1')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6 col-sm-12">
                                                <label for="city">City: </label>
                                                <input type="text" name="city" value="{{ $event->city }}" class="form-control" id="city" placeholder="City" required>
                                                @error('city')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <label for="state">State: </label>
                                                <input type="text" name="state" value="{{ $event->state }}" class="form-control" id="state" placeholder="state" required>
                                                @error('state')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary mr-2">Update <i class="fa fa-check"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
