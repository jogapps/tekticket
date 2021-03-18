@extends('frontend.organizer.layout.default')

@section('body')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget">
                        <div class="widget-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="state">
                                    <h6>Total Event Created</h6>
                                    <h2>{{ $count['total_event_created'] }}</h2>
                                </div>
                                <div class="icon">
                                    <i class="ik ik-calendar"></i>
                                </div>
                            </div>
                            <small class="text-small mt-10 d-block">The Total Number Of Event Created By You.</small>
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
                                    <h6>Total Tickets Sold</h6>
                                    <h2>{{ $count['total_tickets_sold'] }}</h2>
                                </div>
                                <div class="icon">
                                    <i class="ik ik-thumbs-up"></i>
                                </div>
                            </div>
                            <small class="text-small mt-10 d-block">Total ticket purchased from created event</small>
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
                                    <h6>Total Used Tickets</h6>
                                    <h2>{{ $count['total_used_tickets'] }}</h2>
                                </div>
                                <div class="icon">
                                    <i class="ik ik-calendar"></i>
                                </div>
                            </div>
                            <small class="text-small mt-10 d-block">Total Events</small>
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
                                    <h6>Total Tickets Refund</h6>
                                    <h2>{{ $count['total_tickets_refund'] }}</h2>
                                </div>
                                <div class="icon">
                                    <i class="ik ik-message-square"></i>
                                </div>
                            </div>
                            <small class="text-small mt-10 d-block">Total Comments</small>
                        </div>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    @if ($latestEvent)
                        @if (!$latestEvent->published)
                            <button type="button" class="btn btn-block btn-warning">This Event Is Disabled, Contact Admin For More Info.</button>
                        @endif
                        <div class="card" style="min-height: 422px;">
                            <div class="card-header">
                                <h3>Lastest Event</h3>
                                <div class="card-header-right">
                                    STATUS:
                                    @if ($latestEvent->status ===  OPEN)
                                        <button class="btn btn-outline-success"><strong>{{ ucfirst($latestEvent->getStatus()) }} <i class="fa fa-check"></i></strong></button>
                                    @else
                                        <button class="btn btn-outline-danger"><strong>{{ ucfirst($latestEvent->getStatus()) }} <i class="fa fa-stop-circle"></i></strong> </button>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body timeline">
                                <div class="header bg-theme" {{--style="background-image: url('{{ asset('assets/frontend/organizer/img/placeholder/placeimg_400_200_nature.jpg') }}')"--}}>
                                    <div class="color-overlay d-flex align-items-center">
                                        <div class="day-number">{{ $latestEvent->event_date->format('d') }}</div>
                                        <div class="date-right">
                                            <div class="day-name">{{ $latestEvent->event_date->format('l') }}</div>
                                            <div class="month">{{ $latestEvent->event_date->format('F Y') }}</div>
                                        </div>
                                    </div>
                                </div>
                                <ul>
                                    <li>
                                        <div class="bullet bg-teal"></div>
                                        <div class="time"><i class="fa fa-arrow-right"></i></div>
                                        <div class="desc">
                                            <h3>Event Title</h3>
                                            <h4>{{ $latestEvent->title }}</h4>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="bullet bg-pink"></div>
                                        <div class="time"><i class="fa fa-arrow-right"></i></div>
                                        <div class="desc">
                                            <h3>Ticket Status</h3>
                                            <h4>{{ $latestEvent->ticket_status }}</h4>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="bullet bg-green"></div>
                                        <div class="time"><i class="fa fa-arrow-right"></i></div>
                                        <div class="desc">
                                            <h3>Location</h3>
                                            <h4>{{ $latestEvent->getLocation() }}</h4>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="bullet bg-orange"></div>
                                        <div class="time"><i class="fa fa-arrow-right"></i></div>
                                        <div class="desc">
                                            <h3>Category</h3>
                                            <h4>{{ $latestEvent->category->name }}</h4>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="bullet bg-lime"></div>
                                        <div class="time"><i class="fa fa-arrow-right"></i></div>
                                        <div class="desc">
                                            <a class="btn btn-outline-info" href="{{ route('organizer.events.show', $latestEvent) }}">
                                                Event Details <i class="fa fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                    @if ($latestEvent->status === OPEN && $latestEvent->published)
                                        <li>
                                            <div class="bullet bg-fuchsia"></div>
                                            <div class="time"><i class="fa fa-arrow-right"></i></div>
                                            <div class="desc">
                                                <form action="{{ route('organizer.tickets.validate') }}" method="post" class="validate-ticket">
                                                    @csrf
                                                    <input type="hidden" value="{{ $latestEvent->id }}" name="event">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <input type="text" placeholder="Ticket Code" name="ticket" class="form-control" required>
                                                        </div>
                                                        <div class="col-md-12 mt-5">
                                                            <button type="submit" class="btn btn-block btn-outline-success btn-sm">Validate <i class="fa fa-check"></i></button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </li>
                                        <h4 class="notify-message text-center text-capitalize"></h4>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    @else
                        <div class="card" style="min-height: 422px;">
                            <div class="card-header">
                                <h3>Lastest Event</h3>
                            </div>
                            <div class="card-body timeline">
                                <div class="header bg-theme" {{--style="background-image: url('{{ asset('assets/frontend/organizer/img/placeholder/placeimg_400_200_nature.jpg') }}')"--}}>
                                    <div class="color-overlay d-flex align-items-center">
                                        <div class="day-number">0</div>
                                        <div class="date-right">
                                            <div class="day-name">No Event</div>
                                        </div>
                                    </div>
                                </div>
                                <ul>
                                    <li>
                                        <div class="bullet bg-pink"></div>
                                        <div class="time"><i class="fa fa-arrow-right"></i></div>
                                        <div class="desc">
                                            <h3>Ticket Status</h3>
                                            <h4>N/A</h4>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="bullet bg-green"></div>
                                        <div class="time"><i class="fa fa-arrow-right"></i></div>
                                        <div class="desc">
                                            <h3>Location</h3>
                                            <h4>N/A</h4>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="bullet bg-orange"></div>
                                        <div class="time"><i class="fa fa-arrow-right"></i></div>
                                        <div class="desc">
                                            <h3>Category</h3>
                                            <h4>N/A</h4>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header row">
                            <div class="col col-sm-3">
                              Notifications
                            </div>
                        </div>
                        <div class="card-body p-0">
                            @forelse(auth()->user()->unreadNotifications()->latest()->get() as $notification)
                                <div class="list-item-wrap">
                                    <div class="list-item">
                                        <div class="item-inner">
                                            <div class="list-title"><a href="{{ $notification->data['link'] }}"><strong>{{  $notification->data['event_title'] }}: </strong>{{ $notification->data['message'] }}
                                                <i class="float-right">{{ $notification->created_at->format('M jS, Y') }}</i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @break($loop->iteration === 12)
                            @empty
                                <div class="list-item-wrap">
                                    <div class="list-item">
                                        <div class="item-inner">
                                            <div class="list-title"><a href="javascript:void(0)">No Notification</a></div>
                                        </div>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
