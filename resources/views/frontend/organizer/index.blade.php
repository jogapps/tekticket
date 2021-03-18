<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the official wwebsite | TekTicket</title>
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

        .gray-bg{
            background: rgb(250, 250, 250);
        }

        @media(min-width: 720px) {
            .content-x {
                margin: 64px auto;
                font-size: 12px;
                font-weight: 600px;
                max-width: 1280px;
            }
            .content-x h2 {
                font-size: 3em;
                line-height: 1.4;
                font-weight: 400;
                text-align: center;
                color:rgb(38, 38, 38);
                font-family: Averta, "Helvetica Neue", Helvetica, Arial, sans-serif;
                -webkit-font-smoothing: antialiased;
                line-height: 1.4;
                letter-spacing: 0.3px;
                box-sizing: border-box;
            }
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
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('assets/frontend/customer/assets/images/tek-tickets.png') }}" alt="logo">
                            </a>
                        </div>

                        <div id="expand-more" class="large-screen-navlinks">
                            <ul class="navbar-nav large-screen-menulinks">
                                @foreach($categories as $category)
                                    <li class="nav-item menu-links-outer-div">
                                        <div class="menu-links-inner-div">
                                            <a class="nav-link" href="{{ route('events.listing',['keyword' => $category->slug]) }}">{{ $category->name }}</a>
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
                                            <a class="dropdown-item" href="{{ route('organizer.login') }}">Sell Ticket</a>
                                        </div>
                                    </li>
                                @endauth

                            </ul>
                        </li>
                        <li class="nav-item  menu-links-outer-div help">
                            <div class="menu-links-inner-div">
                                <a class="nav-link" href="{{ route('help.index') }}"> Help </a>
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
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('assets/frontend/customer/assets/images/tek-tickets.png') }}" alt="logo">
                            </a>
                        </div>

                        <div id="expand-more" class="large-screen-navlinks">
                            <ul class="navbar-nav large-screen-menulinks">
                                @foreach($categories as $category)
                                    <li class="nav-item menu-links-outer-div">
                                        <div class="menu-links-inner-div">
                                            <a class="nav-link" href="{{ route('events.listing',['keyword' => $category->slug]) }}">{{ $category->name }}</a>
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
                                            <a class="dropdown-item" href="{{ route('organizer.login') }}">Sell Ticket</a>
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
                    <a href="{{ route('organizer.login') }}" class="btn">Login As An Organizer <i class="fa fa-arrow-right"></i> </a>
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
                                <a class="nav-link" href="{{ route('organizer.login') }}"> Sell Tickets </a>
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

    <!-- main section of the body here -->
    <section class="main-content-section">
        <div class="container">
            <div class="row">
                <div class="content-x">
                    <div class="content-x-panel">
                        <!-- first column here -->
                        <div class="col-12">
                            <h2 >You’re Covered When You Sell Tickets With Ticketmaster</h2>
                        </div>
                        <!-- end of first column -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="row">
                        <div class="col-md-1">
                            <i class="fa fa-circle-notch fa-2x text-primary"></i>
                        </div>
                        <div class="col-md-11">
                            <h5 class="text-success">Hassle Free</h5>
                            <p>When you list with us, we’ll help manage your entire transaction. From transfers to payments we have you covered every step of the way.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="row">
                        <div class="col-md-1">
                            <i class="fa fa-calendar-alt fa-2x text-primary"></i>
                        </div>
                        <div class="col-md-11">
                            <h5 class="text-success">Event Creation</h5>
                            <p>When you list with us, we’ll help manage your entire transaction. From transfers to payments we have you covered every step of the way.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="row">
                        <div class="col-md-1">
                            <i class="fa fa-ticket-alt fa-2x text-primary"></i>
                        </div>
                        <div class="col-md-11">
                            <h5 class="text-success">Ticket Protection</h5>
                            <p>When you list with us, we’ll help manage your entire transaction. From transfers to payments we have you covered every step of the way.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="row">
                        <div class="col-md-1">
                            <i class="fa fa-wallet fa-2x text-primary"></i>
                        </div>
                        <div class="col-md-11">
                            <h5 class="text-success">Wallet</h5>
                            <p>When you list with us, we’ll help manage your entire transaction. From transfers to payments we have you covered every step of the way.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="gray-bg main-content-section">
        <div class="container">
            <div class="row">
                <div class="content-x">
                    <div class="content-x-panel">
                        <!-- first column here -->
                        <div class="col-12">
                            <h2 >You’re Covered When You Sell Tickets With Ticketmaster</h2>
                        </div>
                        <!-- end of first column -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-12 text-center">
                    <img width="60%" class="img-fluid" src="{{ asset('assets/frontend/organizer/img/calendar.svg') }}"/>
                    <h5 class="text-success">Enter You Event Details</h5>
                    <p>When you list with us, we’ll help manage your entire transaction. From transfers to payments we have you covered every step of the way.</p>
                </div>
                <div class="col-md-4 col-sm-12 text-center">
                    <img width="60%" class="img-fluid" src="{{ asset('assets/frontend/organizer/img/price-tag.svg') }}"/>
                    <h5 class="text-success">Price Your Tickets</h5>
                    <p>When you list with us, we’ll help manage your entire transaction. From transfers to payments we have you covered every step of the way.</p>
                </div>
                <div class="col-md-4 col-sm-12 text-center">
                    <img width="60%" class="img-fluid" src="{{ asset('assets/frontend/organizer/img/credit-card.svg') }}"/>
                    <h5 class="text-success">Get Paid</h5>
                    <p>When you list with us, we’ll help manage your entire transaction. From transfers to payments we have you covered every step of the way.</p>
                </div>

            </div>
        </div>
    </section>

    <section class="main-content-section">
        <div class="container content-x">
            <div class="row">
                <div class="col-md-12">
                    <h4>Frequently Ask Questions</h4>

                    <div id="accordion">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        How Do I sell My Ticket
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" class="collapse show " aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam architecto autem cum debitis est impedit magnam, modi officia perferendis quasi qui quod reiciendis rem reprehenderit rerum sequi sint totam voluptate.
                                </div>
                            </div>
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                        What happened when a customer didn't attend my event after buying ticket
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam architecto autem cum debitis est impedit magnam, modi officia perferendis quasi qui quod reiciendis rem reprehenderit rerum sequi sint totam voluptate.
                                </div>
                            </div>
                        </div>
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
