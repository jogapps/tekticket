<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organizer | TekTicket</title>
    <link rel="stylesheet" href="{{ asset('assets/frontend/customer/assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/customer/assets/css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/customer/assets/css/fontawesome5/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/customer/assets/css/style.css') }}">

    <style>
        .container-fluid {
            padding-right: 0;
            padding-left: 0;
            margin-right: auto;
            margin-left: auto;
        }

        .dropdown-menu{
            margin: 0px;
            padding: 0px;
        }

        .dropdown-item{
            padding-top: 0;
        }
    </style>
</head>

<body>

@include('frontend.customer.includes.header')
<!-- end of header section -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item" aria-current="page">Organizer</li>
        <li class="breadcrumb-item active" aria-current="page">{{ $organizer->name }}</li>
    </ol>
</nav>
<main class="large-screen-padding">
    <div class="container-fluid account-overview my-5">
        <h1 class="h1 font-w d-none d-md-block">{{ $organizer->name }}</h1>
        <h4 class="h4 font-w d-md-none">{{ $organizer->name }}</h4>
        @include('frontend.customer.includes.alert')
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="card-divs mt-4">

                    <!-- For viewport less than medium (768px) -->
                    <div class="d-md-none mb-3">
                        <div class="row px-3">
                            <div class="col-sm-9 col-6 pl-">
                                <h2 class="h5 font-w  pt-3">{{ $organizer->name }}</h2>
                                <small class=" pt-3 small-color">Member since {{ $organizer->created_at->format('M, Y') }}</small>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="row px-3">
                            <div class="col-9">
                                <small class="grey-theme">Email Address</small><br>
                                <p>{{ 'auth()->user()->email' }}</p>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="row px-3">
                            <div class="col-sm-8 col-5">
                                <small class="grey-theme">Phone Number</small><br>
                                <p>{{ 'Not provided' }} <br>
                            </div>
                        </div>
                    </div>
                    <!-- For viewport less than medium (768px) ends -->

                    <!-- For viewport larger than medium (768px)-->
                    <div class="d-none d-md-block">
                        <div class="text-center">
                            <div class="">
                                <img src="{{ asset('uploads/users/' . $organizer->getImage()) }}" alt="" class="profile-img img-fluid center-block">
                            </div>
                            <small class=" pt-3 small-color">Member since {{ $organizer->created_at->format('M, Y') }}</small><br>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="text-left pl-4 py-1">
                            <small class="grey-theme">Email Address</small><br>
                            <p>{{ $organizer->email }}<br>
                            </p>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="text-left pl-4 py-1">
                            <small class="grey-theme">Phone Number</small><br>
                            <p>{{ $organizer->phone ?? 'Not provided' }} <br>
                            </p>
                        </div>
                    </div>
                    <!-- For viewport larger than medium (768px) ends -->

                </div>
                <div class="card-divs mt-4 d-none d-md-block">
                    <p class="color-theme pl-4 pt-3 pb-3"><a href="{{ route('ticket.index') }}"> Add to favorite <i class="fa fa-heart"></i></a></p>
                </div>
                <div class="card-divs mt-4 p-4 d-none d-md-block">
                    <h5 class="h5 pb-3">We're here to help</h5>
                    <p>For any enquiry, You can send us an email at {{ $information->email }}</p>
                    <p>Send us a message <a href="{{ route('contact.us') }}">Click Here</a> </p>
                    <p>Call Us <i class="fa fa-phone"></i> :  <a href="#"> {{ $information->phone_1 }}</a> </p>
                </div>
            </div>

            <div class="col-lg-9 col-md-8 px-">
                <section class="large-screen-padding main-content-section">
                    <div class="container-fluid mt-3">
                        <div class="row mx-auto">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="h5">All Events</h4>
                                    </div>
                                </div>

                                @forelse($organizer->events()->published()->orderBy('event_date', 'desc')->get() as $event)
                                    <div class="row @if($loop->first) mt-3 @else mt-5 @endif ">
                                        <div class="col-lg-3 col-sm-6 col-md-3 angle-down line-h-10">
                                            <div class="row event-dates">
                                                <div class="col-md-12 col-4">
                                                    <p class="color-theme">{{ $event->event_date->format('M jS, Y') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 line-h-10">
                                            <div class="row">
                                                <div class="col-sm-9 col-9 col-lg-12">
                                                    <p class="font-w">{{ $event->title }}</p>
                                                    <p class="grey-theme font-14">{{ $event->getLocation() }}</p>
                                                    <div class="col color-theme my-2 align-text-left ml-n3">
                                                        {{ $event->getStatus() }}
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 col-3 d-md-none text-right">
                                                    <i class="fa fa-ellipsis-v fa-2x mt-n5"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 text-center expand-at-medium">
                                            <a href="{{ route('events.details', ['slug' => $event->slug]) }}" class="btn mt-2 button-color white event-info">See Tickets</a>
                                        </div>
                                    </div>
                                    @if (!$loop->last)
                                        <div class="dropdown-divider"></div>
                                    @endif
                                @empty
                                    <p>This Organizer has not hosted any event</p>
                                @endforelse

                                {{--Pagination--}}

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</main>

<div class="container-fluid">
    @include('frontend.customer.includes.footer')
</div>

<script src="{{ asset('assets/frontend/customer/assets/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/frontend/customer/assets/js/custom.js') }}"></script>
<script src="{{ asset('assets/frontend/customer/assets/js/bootstrapjs/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/frontend/customer/assets/js/countries/dist/countries.js') }}"></script>

@stack('custom-script')
</body>

</html>
