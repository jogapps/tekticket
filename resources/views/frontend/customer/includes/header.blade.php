<div class="container-fluid">
    <div class="row white-div">
        <div class="col-12 hide-and-show" id="white-div-nav">
            <nav class="navbar navbar-expand-lg row">

                <!-- first column of white nav -->
                <div class="col-4 col-lg-7 mb-3">
                    <div class="row">
                        <div class="col-12 col-lg-2 white-div-logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('assets/frontend/customer/assets/images/tek-tickets.png') }}" alt="logo" width="100" height="100">
                            </a>
                        </div>

                        <!-- hide and show this header on >=medium devices -->
                        <div class="col-lg-6 col-xl-4 white-div-form">
                            <form class="" action="">
                                <div class="form-row">
                                    <div class="col-lg-12">
                                        <input class="form-control search" type="text" name="" id="white-navbar-input-field"
                                               placeholder="Find millions of live experiences">
                                        <i class="fas fa-search input-search-icon"></i>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div id="expand-more" class="col-lg-6 col-xl-6 large-screen-navlinks">
                            <ul class="navbar-nav large-screen-menulinks">
                                @foreach($menus as $menu)
                                    <li class="nav-item menu-links-outer-div">
                                        <div class="menu-links-inner-div">
                                            <a class="nav-link" href="{{ route('events.listing',['keyword' => $menu->slug]) }}">{{ $menu->name }}</a>
                                        </div>
                                    </li>
                                    @break($loop->iteration === 3)
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- hide and show this header on >=medium devices -->
                </div>

                <!-- second column of white nav-->
                <div class="navbar-expand col-5 col-md-3 col-lg-5 col-xl-4 mb-3 navbar-icons">
                    <ul class="navbar-nav">
                        <li class="nav-item menu-links-outer-div list-search-icon">
                            <div class="menu-links-inner-div">
                                <a class="nav-link" href="#"> <i class="fas fa-search"></i> </a>
                            </div>
                        </li>
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
                                            <a class="dropdown-item" href="{{ route('login') }}">Sign Out</a>
                                        </div>
                                    </li>
                                @else
                                    <li class="nav-item sub-list-div">
                                        <div class="sub-list-link">
                                            <a class="dropdown-item" href="{{ route('organizer.login') }}">Sell Ticket</a>
                                        </div>
                                    </li>
                                    <li class="nav-item sub-list-div">
                                        <div class="sub-list-link">
                                            <a class="dropdown-item" href="{{ route('profile.index') }}">My Profile</a>
                                        </div>
                                    </li>
                                    <li class="nav-item sub-list-div">
                                        <div class="sub-list-link">
                                            <a class="dropdown-item" href="{{ route('login') }}">Login</a>
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
            <nav class="navbar navbar-expand-lg row">

                <!-- first column of blue nav-->
                <div class="col-4 col-lg-7 mb-3">
                    <div class="row">
                        <div class="col-12 col-lg-2 blue-div-logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('assets/frontend/customer/assets/images/tek-tickets.png') }}" alt="logo" width="100" height="100">
                            </a>
                        </div>

                        <!-- hide and show this header on >=medium devices -->
                        <div class="col-lg-6 col-xl-4 blue-div-form">
                            <form class="" action="">
                                <div class="form-row">
                                    <div class="col-lg-12">
                                        <input class="form-control search" type="text" name="" id="blue-navbar-input-field"
                                               placeholder="Search for event near you">
                                        <i class="fas fa-search input-search-icon"></i>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div id="expand-more" class="col-lg-6 col-xl-6  large-screen-navlinks">
                            <ul class="navbar-nav large-screen-menulinks">
                                @foreach($menus as $menu)
                                    <li class="nav-item menu-links-outer-div">
                                        <div class="menu-links-inner-div">
                                            <a class="nav-link" href="{{ route('events.listing',['keyword' => $menu->slug]) }}">{{ $menu->name }}</a>
                                        </div>
                                    </li>
                                    @break($loop->iteration === 3)
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- hide and show this header on >=medium devices -->
                </div>

                <!-- second column of blue nav-->
                <div class="navbar-expand col-5 col-md-3 col-lg-5 col-xl-4 mb-3 navbar-icons">
                    <ul class="navbar-nav">
                        <li class="nav-item menu-links-outer-div list-search-icon">
                            <div class="menu-links-inner-div">
                                <a class="nav-link" href="#"> <i class="fas fa-search"></i> </a>
                            </div>
                        </li>
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
                                            <a class="dropdown-item" href="{{ route('organizer.login') }}">Sell Ticket</a>
                                        </div>
                                    </li>
                                    <li class="nav-item sub-list-div">
                                        <div class="sub-list-link">
                                            <a class="dropdown-item" href="{{ route('profile.index') }}">My Profile</a>
                                        </div>
                                    </li>
                                    <li class="nav-item sub-list-div">
                                        <div class="sub-list-link">
                                            <a class="dropdown-item" href="{{ route('login') }}">Login</a>
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

    <!-- show modal conatiner until large screen -->
    <div id="modal-nav-box">
        <div class="modal-nav-container">
            <div class="modal-nav-content">
                <div class="modal-nav-header">
                    <!-- <span class="modal-content-header"> -->
                    <div id="modal-user-name">Account </div>
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
                        <li class="nav-item">
                            <a class="nav-link" href="#"> Concert </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"> Sport </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"> Art </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"> VIP </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"> Deals </a>
                        </li>
                    </ul>

                    <hr class="modal-horizontal-line">

                    <a class="list-link-heading" href="#">My Account</a>
                    <ul class="nav modal-list-links">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ticket.index') }}"> My Tickets </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"> My Listings </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"> Settings </a>
                        </li>
                    </ul>

                    <a class="list-link-heading" href="#">Learn About Verified Tickets</a>
                    <ul class="nav modal-list-links">
                        <li class="nav-item app-buttons">
                            <a class="nav-link" href="#">
                                <img src="assets/images/app-store-btn.png" alt="" width="130">
                            </a>
                            <a class="nav-link" href="#">
                                <img src="assets/images/google-play-btn.png" alt="" width="130">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"> Not Maryam? Sign Out </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
