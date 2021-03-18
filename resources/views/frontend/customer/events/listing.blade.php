<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ucwords($keyword) ?? $events[0]->category->menu->name }} | TekTicket</title>
    <link rel="stylesheet" href="{{ asset('assets/frontend/customer/assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/customer/assets/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/customer/assets/css/fontawesome5/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/customer/assets/css/style.css') }}">


    <style>

        .dropdown-menu{
            width: 200px;
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
<!-- header section ends -->

<main>
    <section class="section-for-advert">
        <div class="row advert-section">
            <div class="col-lg-8 col-xl-7 mx-auto" id="advert-img-div">
                <img src="https://tpc.googlesyndication.com/simgad/3861415721932990274" alt="" width="728" height="90">
            </div>
        </div>
    </section>

    <section class="large-screen-padding main-content-section">
        <div class="container-fluid my-5">
            <!-- sport section -->
            <div class="row mt-5">
                <div class="col-12 popular-concert-section">
                    <div class="popular-events">
                        {{ strtoupper($keyword) }}
                    </div>
                    <div class="see-all-concerts">
                        <a href="#" class="color-theme" id="all-concerts">{{ $events[0]->category->menu->name ?? 'No Event Found' }}</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 concert-artists-imgs">
                    <div class="row">
                        @forelse($events as $event)
                            <div class="col-12 col-md-4">
                            <div class="row mt-4 celtic-events">
                                <div class="col-md-12 col-sm-5 col-4">
                                    <img class="img-fluid" src="{{ $event->image }}" alt="">
                                    <div class="artist-label-img expand-at-medium">
                                        <a href="{{ route('events.details', ['slug' => $event->slug]) }}">{{ $event->title }}</a>
                                        <a class="" href="#">{{ $event->event_date->format('M jS, Y') }}</a>
                                    </div>
                                </div>
                                <div class="col-sm-5 col-6">
                                    <div class="row">
                                        <div class="col-12 color-theme">
                                            Celtic
                                        </div>
                                        <div class="col-12">
                                            18 Events
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1 col-2 mt-2 hearts">
                                    <i class="far fa-heart"></i>
                                </div>
                            </div>
                        </div>
                        @empty
                            <div class="col-12">
                                No Event Found
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid less-md-block">
            <div class="row">
                <div class="col-12" id="popular">
                    Related Events
                </div>
            </div>
            @foreach($categories as $category)
                <div class="row mt-5">
                    <div class="col-12 popular-concert-section">
                        <div class="popular-events">
                            {{ $category->name }}
                        </div>
                        <div class="see-all-concerts">
                            <a href="#" class="color-theme" id="see-all">See All</a>
                            <a href="{{ route('events.listing',['keyword' => $category->slug]) }}" class="color-theme" id="all-concerts">See All {{ $category->name }} </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 concert-artists-imgs">
                        <div class="row">
                            @foreach($category->events()->published()->get() as $event)
                                <div class="col-12 col-md-4">
                                    <div class="row mt-4 celtic-events">
                                        <div class="col-md-12 col-sm-5 col-4">
                                            <img class="" src="{{ $event->image }}" alt="">
                                            <div class="artist-label-img expand-at-medium">
                                                <a href="{{ route('events.details', ['slug' => $event->slug]) }}">{{ $event->title }}</a>
                                                <a href="{{ route('events.details', ['slug' => $event->slug]) }}">{{ $event->city }}</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-5 col-6">
                                            <div class="row">
                                                <div class="col-12 color-theme">
                                                    <a href="{{ route('events.details', ['slug' => $event->slug]) }}">
                                                        {{ $event->title }}
                                                    </a>
                                                </div>
                                                <div class="col-12">
                                                    18 Events
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1 col-2 mt-2 hearts">
                                            <i class="far fa-arrow-right"></i>
                                        </div>
                                    </div>
                                </div>
                                @break($loop->iteration === 6)
                            @endforeach
                        </div>
                    </div>
                </div>
                @break($loop->iteration === 3)
            @endforeach

        </div>

        <div class="container-fluid mt-5">
            <div class="row mx-auto">
                <div class="col">
                    <h4>Fans Also Viewed</h4>
                </div>
            </div>

            <div class="row mx-auto fans-views-images">
                <div class="col-12">
                    <div class="row">
                        @foreach($randomEvents as $event)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-5">
                            <img class="" src="{{ $event->image }}" alt="">
                            <div class="artist-label-img">
                                <a href="{{ route('events.details', ['slug' => $event->slug]) }}">{{ $event->title }}</a>
                                <a href="#">See all Events</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>


<div class="container-fluid">
   @include('frontend.customer.includes.footer')
</div>

<script src="{{ asset('assets/frontend/customer/assets/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('assets/frontend/customer/assets/bootstrap.js') }}"></script>
<script src="{{ asset('assets/frontend/customer/assets/js/custom.js') }}"></script>
</body>
</html>
