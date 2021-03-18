<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Tickets</title>
    <link rel="stylesheet" href="{{ asset('assets/frontend/customer/assets/css/orders.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/customer/assets/css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/customer/assets/css/fontawesome5/css/all.min.css') }}">

    <style>
        .container-fluid {
            padding-right: 0;
            padding-left: 0;
            margin-right: auto;
            margin-left: auto;
        }

        .dropdown-menu{
            width: 200px;
            margin: 0px;
            padding: 0px;
        }

        .dropdown-item{
            padding-top: 0;
        }

        @media only screen and (min-width: 350px){
            #my-events-listing{
                padding-top: 28px;
                padding-bottom: 25px;
            }
        }

        @media only screen and (min-width: 483px) {
            #my-events-listing{
                padding-top: 40px;
                padding-bottom: 37px;
            }
        }

    </style>
</head>

<body class="ticket-container">
@include('frontend.customer.includes.header')
<!-- end of header section -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tickets</li>
    </ol>
</nav>
<main class="large-screen-padding">
    <div class="row " id="my-events-listing">
        <div class="col-12" id="my-ticket-listings">
            <h4>My Ticket</h4>
            <a href="#" class="my-listings"> <span>View My Events</span> </a>
        </div>
    </div>
    @include('frontend.customer.includes.alert')
    <!-- nav tabs -->
    <div id="nav-tabs">
        <div class="row">
            <div class="col-12">
                <ul class="row nav" role="tablist">
                    <li class="col-md-2 nav-item ticket-list">
                        <a href="#active-tickets" data-toggle="tab" class="nav-link active">
                            Active
                        </a>
                    </li>
                    <li class="col-md-2 nav-item ticket-list">
                        <a href="#used" data-toggle="tab" class="nav-link">Used</a>
                    </li>

                    <li class="col-md-2 nav-item ticket-list">
                        <a href="#expired" data-toggle="tab" class="nav-link">Expired</a>
                    </li>

                </ul>
            </div>
            <!-- <div class="col-11 mx-auto">
                <hr id="order-page-line">
            </div> -->
        </div>

        <div class="row tab-content">
            <div class="col-12 active tab-pane text-center" id="active-tickets">
                <div class="row mt-5">
                    @forelse(auth()->user()->tickets()->pending()->get() as $ticket)
                        <div class="col-3">
                        <div class="card">
                            <img class="card-img" src="{{ $ticket->eventPrice->event->image }}" alt="Bologna">
                            <div class="card-img-overlay">
                                <a href="#" class="btn btn-light btn-sm">{{ $ticket->eventPrice->event->title }}</a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $ticket->eventPrice->getTitle() }}</h5>
                                <h4 class="card-title">&#8358;{{ number_format($ticket->amount,2) }}</h4>
                                <span class="text-muted cat">
                                    <i class="far fa-calendar text-info"></i> Event date:  <strong>{{ $ticket->eventPrice->event->event_date->format('M jS, Y') }}</strong>
                                </span>
                                {{--<a href="#" class="btn btn-outline-info">Read Recipe</a>--}}
                            </div>
                            <div class="card-footer text-muted d-flex row justify-content bg-transparent border-top-0">
                                <div class="views col-md-7">
                                    {{ $ticket->eventPrice->event->getLocation() }}
                                </div>
                                <div class=" col-md-4 col-sm-12">
                                    {!! QrCode::color(208, 132, 27)->size(100)->generate($ticket->code) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <div class="col-12 svg-img">
                            <!-- <img src="assets/images/card-img.svg" alt="" width="160" height="160"> -->
                            <div class="ticket-div" title="Ticket Graphic">
                                <i class="fa fa-ticket-alt second"></i>
                                <i class="fa fa-ticket-alt first"></i>
                            </div>
                            <div class="col-12 ticket-lists-comment">
                                <p>You don't have any unused ticket.</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
            <div class="col-12 tab-pane text-center" id="used">
                <div class="row mt-5">
                    @forelse(auth()->user()->tickets()->used()->get() as $ticket)
                        <div class="col-3">
                            <div class="card">
                                <img class="card-img" src="{{ $ticket->eventPrice->event->image }}" alt="Bologna">
                                <div class="card-img-overlay">
                                    <a href="#" class="btn btn-light btn-sm">{{ $ticket->eventPrice->event->title }}</a>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $ticket->eventPrice->title }}</h5>
                                    <h4 class="card-title">&#8358;{{ number_format($ticket->amount,2) }}</h4>
                                    <span class="text-muted cat">
                                    <i class="far fa-calendar text-info"></i> Event date:  <strong>{{ $ticket->eventPrice->event->event_date->format('M jS, Y') }}</strong>
                                </span>
                                    {{--<a href="#" class="btn btn-outline-info">Read Recipe</a>--}}
                                </div>
                                <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
                                    <div class="views">
                                        {{ $ticket->eventPrice->event->getLocation() }}
                                    </div>

                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 svg-img">
                            <!-- <img src="assets/images/card-img.svg" alt="" width="160" height="160"> -->
                            <div class="ticket-div" title="Ticket Graphic">
                                <i class="fa fa-ticket-alt second"></i>
                                <i class="fa fa-ticket-alt first"></i>
                            </div>
                            <div class="col-12 ticket-lists-comment">
                                <p>You don't have any used ticket.</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
            <div class="col-12 tab-pane text-center" id="expired">
                <div class="row mt-5">
                    @forelse(auth()->user()->tickets()->refund()->get() as $ticket)
                        <div class="col-3">
                            <div class="card">
                                <img class="card-img" src="{{ $ticket->eventPrice->event->image }}" alt="Bologna">
                                <div class="card-img-overlay">
                                    <a href="#" class="btn btn-light btn-sm">{{ $ticket->eventPrice->event->title }}</a>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $ticket->eventPrice->title }}</h5>
                                    <h4 class="card-title">&#8358;{{ number_format($ticket->amount,2) }}</h4>
                                    <span class="text-muted cat">
                                    <i class="far fa-calendar text-info"></i> Event date:  <strong>{{ $ticket->eventPrice->event->event_date->format('M jS, Y') }}</strong>
                                </span>
                                    {{--<a href="#" class="btn btn-outline-info">Read Recipe</a>--}}
                                </div>
                                <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
                                    <div class="views">
                                        {{ $ticket->eventPrice->event->getLocation() }}
                                    </div>

                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 svg-img">
                            <!-- <img src="assets/images/card-img.svg" alt="" width="160" height="160"> -->
                            <div class="ticket-div" title="Ticket Graphic">
                                <i class="fa fa-ticket-alt second"></i>
                                <i class="fa fa-ticket-alt first"></i>
                            </div>
                            <div class="col-12 ticket-lists-comment">
                                <p>You don't have any expired ticket.</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
        <!-- nav tabs end here -->

    </div>

</main>

<div class="container-fluid">
    @include('frontend.customer.includes.footer')
</div>


<script src="{{ asset('assets/frontend/customer/assets/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/frontend/customer/assets/js/custom.js') }}"></script>
<script src="{{ asset('assets/frontend/customer/assets/js/bootstrapjs/bootstrap.min.js') }}"></script>

</body>

</html>
