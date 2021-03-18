<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help | TekTicket</title>
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
            .content-x h5 {
                font-size: 1.3em;
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
                    <h5>Need Help? We Are Here For You!</h5>
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
    @yield('body')
</main>


<div class="container-fluid">
    @include('frontend.customer.includes.footer')
</div>

<script src="{{ asset('assets/frontend/customer/assets/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('assets/frontend/customer/assets/bootstrap.js') }}"></script>
<script src="{{ asset('assets/frontend/customer/assets/js/custom.js') }}"></script>
</body>

</html>
