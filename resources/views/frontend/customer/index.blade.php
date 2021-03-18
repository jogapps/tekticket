<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To The Official Website | TekTicket</title>
    <link rel="stylesheet" href="{{ asset('assets/frontend/customer/assets/css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/customer/assets/bootstrap.css') }}">
    <!-- <link rel="stylesheet" href="assets/css/index.css"> -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/customer/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/customer/assets/css/fontawesome5/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/customer/assets/css/newsletter.css') }}">
    <style>
        .dropdown-menu {
            width: 200px;
            margin: 0px;
            padding: 0px;
        }

        .dropdown-item {
            padding-top: 0;
        }

    </style>
</head>

<body>
<div class="container-fluid">
    <div class="row white-div">
        <div class="col-12 hide-and-show" id="white-div-nav">
            <nav class="navbar navbar-expand-md row outer-custom-flex">

                <!-- first column of white nav -->
                <div class="">
                    <div class="row inner-custom-flex">
                        <div class="white-div-logo">
                            <a href="#">
                                <img src="{{ asset('assets/frontend/customer/assets/images/tek-tickets.png') }}" alt="logo">
                            </a>
                        </div>

                        <div id="expand-more" class="large-screen-navlinks">
                            <ul class="navbar-nav large-screen-menulinks">
                                @foreach($menus as $menu)
                                    <li class="nav-item menu-links-outer-div">
                                        <div class="menu-links-inner-div">
                                            <a class="nav-link" href="{{ route('events.listing',['keyword' => $menu->slug]) }}">{{ $menu->name }}</a>
                                        </div>
                                    </li>
                                    @break($loop->iteration === 4)
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- hide and show this header on >=medium devices -->
                </div>

                <!-- second column of white nav-->
                <div class="navbar-expand  mb-3 navbar-icons">
                    <ul class="navbar-nav">
                        {{--<li class="nav-item menu-links-outer-div">
                            <div class="menu-links-inner-div">
                                <a class="nav-link" href="#"> <i class="fas fa-search"></i> </a>
                            </div>
                        </li>--}}
                        <li class="nav-item dropdown menu-links-outer-div">
                            <div class="menu-links-inner-div">
                                <a class="nav-link" href="#" data-toggle="dropdown">
                                    <i class="far fa-user-circle"></i>
                                    <span class="username">Account</span>
                                </a>
                            </div>
                            <ul class="dropdown-menu dropdown-menu-right">
                                @auth
                                    <li class="nav-item sub-list-div">
                                        <div class="sub-list-link">
                                            <a class="dropdown-item" href="{{ route('profile.index') }}">My Profile</a>
                                        </div>
                                    </li>
                                    <li class="nav-item sub-list-div">
                                        <div class="sub-list-link">
                                            <a class="dropdown-item" href="{{ route('ticket.index') }}">My Tickets</a>
                                        </div>
                                    </li>
                                    <li class="nav-item sub-list-div">
                                        <div class="sub-list-link">
                                            <a class="dropdown-item" href="{{ route('logout') }}">Sign Out</a>
                                        </div>
                                    </li>
                                @else
                                    <li class="nav-item sub-list-div">
                                        <div class="sub-list-link">
                                            <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                                        </div>
                                    </li>
                                    <li class="nav-item sub-list-div">
                                        <div class="sub-list-link">
                                            <a class="dropdown-item" href="{{ route('profile.index') }}">My Profile</a>
                                        </div>
                                    </li>
                                    <li class="nav-item sub-list-div">
                                        <div class="sub-list-link">
                                            <a class="dropdown-item" href="{{ route('organizer.login') }}">Organizer Login</a>
                                        </div>
                                    </li>
                                    <li class="nav-item sub-list-div">
                                        <div class="sub-list-link">
                                            <a class="dropdown-item" href="{{ route('organizer.home') }}">Sell Ticket</a>
                                        </div>
                                    </li>
                                @endauth

                            </ul>
                        </li>
                        <li class="nav-item  menu-links-outer-div help">
                            <div class="menu-links-inner-div">
                                <a class="nav-link" href="{{ route('help.index') }}">Help</a>
                            </div>
                        </li>
                    </ul>
                    <div class="hamburger-outer-div">
                        <div class="hamburger-icon" type="button">
                            <div class="toggler-icon"></div>
                            <div class="toggler-icon"></div>
                            <div class="toggler-icon"></div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- white nav ends here -->

    <!-- blue navbar -->
    <div class="row blue-div">
        <div class="col-12" id="blue-div-nav">
            <nav class="navbar navbar-expand-md row outer-custom-flex">

                <!-- first column of blue nav-->
                <div class="mb-3">
                    <div class="row inner-custom-flex">
                        <div class="blue-div-logo">
                            <a href="#">
                                <img src="{{ asset('assets/frontend/customer/assets/images/tek-tickets.png') }}" alt="logo">
                            </a>
                        </div>

                        <div id="expand-more" class="large-screen-navlinks">
                            <ul class="navbar-nav large-screen-menulinks">
                                @foreach($menus as $menu)
                                    <li class="nav-item menu-links-outer-div">
                                        <div class="menu-links-inner-div">
                                            <a class="nav-link" href="{{ route('events.listing',['keyword' => $menu->slug]) }}">{{ $menu->name }}</a>
                                        </div>
                                    </li>
                                    @break($loop->iteration === 4)
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- hide and show this header on >=medium devices -->
                </div>

                <!-- second column of blue nav-->
                <div class="navbar-expand  mb-3 navbar-icons">
                    <ul class="navbar-nav">
                        {{--<li class="nav-item menu-links-outer-div">
                            <div class="menu-links-inner-div">
                                <a class="nav-link" href="#"> <i class="fas fa-search"></i> </a>
                            </div>
                        </li>--}}
                        <li class="nav-item dropdown menu-links-outer-div">
                            <div class="menu-links-inner-div">
                                <a class="nav-link" data-toggle="dropdown">
                                    <i class="far fa-user-circle"></i>
                                    <span class="username">Account</span>
                                </a>
                            </div>
                            <ul class="dropdown-menu dropdown-menu-right">
                                @auth
                                    <li class="nav-item sub-list-div">
                                        <div class="sub-list-link">
                                            <a class="dropdown-item" href="{{ route('profile.index') }}">My Profile</a>
                                        </div>
                                    </li>
                                    <li class="nav-item sub-list-div">
                                        <div class="sub-list-link">
                                            <a class="dropdown-item" href="{{ route('ticket.index') }}">My Tickets</a>
                                        </div>
                                    </li>
                                    <li class="nav-item sub-list-div">
                                        <div class="sub-list-link">
                                            <a class="dropdown-item" href="{{ route('logout') }}">Sign Out</a>
                                        </div>
                                    </li>
                                @else
                                    <li class="nav-item sub-list-div">
                                        <div class="sub-list-link">
                                            <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                                        </div>
                                    </li>
                                    <li class="nav-item sub-list-div">
                                        <div class="sub-list-link">
                                            <a class="dropdown-item" href="{{ route('profile.index') }}">My Profile</a>
                                        </div>
                                    </li>
                                    <li class="nav-item sub-list-div">
                                        <div class="sub-list-link">
                                            <a class="dropdown-item" href="{{ route('organizer.login') }}">Organizer Login</a>
                                        </div>
                                    </li>
                                    <li class="nav-item sub-list-div">
                                        <div class="sub-list-link">
                                            <a class="dropdown-item" href="{{ route('organizer.home') }}">Sell Ticket</a>
                                        </div>
                                    </li>
                                @endauth

                            </ul>
                        </li>
                        <li class="nav-item  menu-links-outer-div help">
                            <div class="menu-links-inner-div">
                                <a class="nav-link" href="{{ route('help.index') }}">Help </a>
                            </div>
                        </li>
                    </ul>
                    <div class="hamburger-outer-div">
                        <div class="hamburger-icon" type="button">
                            <div class="toggler-icon"></div>
                            <div class="toggler-icon"></div>
                            <div class="toggler-icon"></div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <div class="container-fluid unforgettable">
            <div class="row expand-at-medium">
                <div class="col pb-2">
                    <h5>Unforgettable Starts Here</h5>
                </div>
            </div>

            <div class="large-screen-padding">
                <div class="row header-search-field">
                    <div class="col-auto col-md-12 col-lg-11">
                        <form action="">
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <input type="text" class="form-control wide" placeholder="Search">
                                    <a href="#" class="btn btn-primary search-box-button">Search</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="row mb-3 header-search-options">
                <div class="col col-md-12 search-links">
                    @foreach($categories as $category)
                        <a href="{{ route('events.listing',['keyword' => $category->slug]) }}" class="btn">{{ $category->name }} </a>
                        @break($loop->iteration === 4)
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- show modal conatiner until large screen -->
    <div id="modal-nav-box">
        <div class="modal-nav-container">
            <div class="modal-nav-content">
                <div class="modal-nav-header">
                    <!-- <span class="modal-content-header"> -->
                    <div id="modal-user-name"> @auth {{ auth()->user()->name }} @else Welcome user @endif </div>
                    <div id="close-btn">
                        <button type="button" class="close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>

                    <!-- </span> -->
                </div>
                <div class="modal-nav-body">
                    <a class="list-link-heading" href="#">Discover</a>
                    <ul class="nav modal-list-links">
                        @foreach($menus as $menu)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('events.listing', ['keyword' => $menu->slug]) }}"> {{ $menu->name }} </a>
                            </li>
                        @endforeach
                    </ul>

                    <hr class="modal-horizontal-line">

                    <a class="list-link-heading" href="#">Account</a>
                    <ul class="nav modal-list-links">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('ticket.index') }}"> My Tickets </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('profile.index') }}"> My Profile </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"> Sign Out </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"> Login </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('profile.index') }}"> My Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('organizer.login') }}">Organizer Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('organizer.home') }}"> Sell Tickets </a>
                            </li>

                        @endauth
                    </ul>
                    {{-- <a class="list-link-heading" href="#">Learn About Verified Tickets</a>--}}
                    <ul class="nav modal-list-links">
                        <li class="nav-item app-buttons">
                            <a class="nav-link" href="#">
                                <img src="{{ asset('assets/frontend/customer/assets/images/app-store-btn.png') }}" alt="" width="130">
                            </a>
                            <a class="nav-link" href="#">
                                <img src="{{ asset('assets/frontend/customer/assets/images/google-play-btn.png') }}" alt="" width="130">
                            </a>
                        </li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">New User? Sign Up </a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end of header section  -->

<main>
    <!-- advert section here -->
    <section class="section-for-advert">
        <div class="container-fluid">
            <div class="row advert-section">
                <div class="col-lg-8 col-xl-6 mx-auto" id="advert-img-div">
                    <img src="https://tpc.googlesyndication.com/simgad/3861415721932990274" alt="" width="728"
                         height="90">
                </div>
            </div>
        </div>
    </section>
    <!-- advert section ends here -->

    <!-- main section of the body here -->
    <section class="large-screen-padding main-content-section">
        <div class="container-fluid ">
            <div class="row">
                <!-- first column here -->
                <div class="col-12 col-lg-8">

                    <!-- main content images here -->
                    <div class="row">
                        <!-- show image slides until medium screen -->
                        <div id="image-slides" class="col-12 hide-at-medium carousel slide" data-ride="carousel">
                            <!-- The slideshow -->
                            <div class="carousel-inner">
                                @foreach($randomEvents as $event)
                                    <div class="carousel-item @if($loop->first) active @endif ">
                                    <a href="#"> <img
                                            src="{{  $event->image }}"
                                            alt="artist2" width="826" height="464" id="image-slide3">
                                    </a>
                                    <div class="row">
                                        <div class="col-11 mb-5 mx-auto pt-3 captions">
                                            <a href="{{ route('events.details', ['slug' => $event->slug]) }}" class="slide-captions">{{ $event->title }}</a>
                                            <p class="caption-text">{{ Str::limit($event->description, 132) }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <!-- Indicators -->
                            <ul class="carousel-indicators my-3">
                                <li data-target="#image-slides" data-slide-to="0" class="active"></li>
                                <li data-target="#image-slides" data-slide-to="1"></li>
                                <li data-target="#image-slides" data-slide-to="2"></li>
                            </ul>
                        </div>

                        <!-- show this static image at medium -->
                        @if (count($justAnnounced))
                            <div class="col-md-12 expand-at-medium" id="img-gallery">
                                <div class="row my-5 mx-auto">
                                    <div class="col-md-6 col-lg-12 static-image1">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <a href="#"> <img
                                                        src="{{ $justAnnounced[0]->image }}"
                                                        alt="artist2" width="926" height="464" id="image-slide3">
                                                </a>
                                            </div>
                                            <div class="col-md-12 mb-5 captions">
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-9">
                                                        <a href="#" class="slide-captions">{{ $justAnnounced[0]->title }}</a>
                                                        <p class="caption-text">{{  $justAnnounced[0]->getLocation() }}</p>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <a href="{{ route('events.details', ['slug' => $justAnnounced[0]->slug]) }}" class="btn button-color live-button" type="button">
                                                            Go Live now
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 hide-at-large static-image2">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <a href="#"> <img
                                                                src="https://s1.ticketm.net/dam/a/f19/6811475b-29a2-4be3-927f-9fd5ff1d9f19_1202251_RETINA_PORTRAIT_16_9.jpg"
                                                                alt="artist1" width="926" height="464" id="image-slide2">
                                                        </a>
                                                    </div>

                                                    <div class="col-md-11 mb-5 captions">
                                                        <a href="#" class="slide-captions">Kane Brown</a>
                                                        <p class="caption-text"> Worldwide Beautiful Tour - tickets on sale!
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <!-- main content images section ends -->
                </div>
                <!-- end of first column -->


                <!-- expand second column at-large-screen -->
                <div class="col-lg-4 my-5 side-body-images expand-at-large">
                    @foreach($randomEvents as $event)
                        <div class="row mt-4">
                        <div class="col-lg-6">
                            <img class="" src="{{ $event->image }}" alt="" width="100%">
                        </div>
                        <div class="col-lg-6 side-img-captions">
                            <a href="{{ route('events.details', ['slug' => $event->slug]) }}">
                                <span class="color-theme">{{ $event->title }}</span><br>
                                {{ $event->getLocation() }}
                            </a>
                        </div>
                    </div>
                        @break($loop->iteration === 3)
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="large-screen-padding main-content-section">
        <div class="container-fluid announcement-div">
            <div class="row mx-auto">
                <div class="col-12">
                    <h3 class="h3">Just Announced</h3>
                </div>
            </div>
            <div class="row mx-auto">
                <div class="col-12 announced-events-section">
                    @foreach($justAnnounced->chunk(3) as $events)
                        <div class="@if($loop->first) first-column @else second-column expand-at-large @endif">
                            @foreach($events as $event)
                                <div class="row announced-events @if($loop->first) mt-2 @endif">
                                    <div class="col-6 col-md-3 col-lg-4">
                                        <img class="fit-image" src="{{ $event->image }}" alt="">
                                    </div>
                                    <div class="col-6 col-lg-4">
                                        <div class="row">
                                            <div class="col-11 col-md-6 col-lg-12 presale">
                                                PRESALE
                                            </div>
                                            <div class="col-12 inner-text-style color-theme my-2">
                                                {{ $event->title }}
                                            </div>
                                            <div class="col-12 inner-text-style">
                                                {{ $event->city }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-lg-4 expand-at-medium text-center">
                                        <a href="{{ route('events.details', ['slug' => $event->slug]) }}" class="btn color-theme event-info">Event Info</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

        <div class="container-fluid discover-events">
            <div class="row">
                <div class="col-11 mx-auto">
                    Discover More Events
                </div>
                <div class="col-12 mt-4">
                    <div class="row mx-auto">
                        <div class="col discover-events-buttons">
                            @foreach($menus as $menu)
                                <a href="{{ route('events.listing', ['keyword' => $menu->slug]) }}" class="btn color-theme event-info">{{ $menu->name }}</a>
                                @break($loop->iteration === 3)
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid less-md-block">
            <div class="row">
                <div class="col-12" id="popular">
                    Popular Categories
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
                            <a href="{{ route('events.listing',['keyword' => $category->slug]) }}" class="color-theme" id="all-concerts">See All {{ $menu->name }} </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 concert-artists-imgs">
                        <div class="row">
                            @foreach($category->events as $event)
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
    </section>
</main>

<div class="modal fade" id="newsletterModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Subscribe to our Newsletter</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <i class="float-right fa fa-close"></i>
                <div class="newsletter container-fluid">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 mx-auto">
                            <div class="card p-4 px-5">
                                <h2 class="font-weight-bold text-white">Stay tuned</h2>
                                <h6 class="text-black-50 mb-5 text-color">Subscribe to our newsletter and never miss our latest news, designs, and product updates.</h6>
                                <form action="{{ route('newsletter.subscribe') }}" method="post">
                                    @csrf
                                    <div class="form-group bg-white border rounded px-2 py-2 mb-2">
                                        <div class="row">
                                            <div class="col"> <input type="email" name="email" class="form-control pl-3 shadow-none bg-transparent border-0" placeholder="Enter your email address"> </div>
                                            <div class="col-auto"> <button type="submit" class="btn btn-block btn-dark"><i class="fa fa-paper-plane-o mr-2"></i>Get notified <i class="fa fa-arrow-right"></i></button> </div>
                                        </div>
                                    </div>
                                </form>
                                <span class="mb-4 text-color">No spam, notifications about events around you.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    @include('frontend.customer.includes.footer')
</div>

<script src="{{ asset('assets/frontend/customer/assets/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('assets/frontend/customer/assets/bootstrap.js') }}"></script>
<script src="{{ asset('assets/frontend/customer/assets/js/custom.js') }}"></script>
</body>

</html>
