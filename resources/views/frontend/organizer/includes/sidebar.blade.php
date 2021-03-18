<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="{{ route('organizer.dashboard') }}">
            <div class="logo-img">
                <img src="{{ asset('assets/frontend/customer/assets/images/tek-tickets.jpg') }}" class="img-fluid header-brand-img">
            </div>
            <span class="text">TekTicket</span>
        </a>
        <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>

    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-lavel">Navigation</div>
                <div class="nav-item @yield('dashboard-active')">
                    <a href="{{ route('organizer.dashboard') }}"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                </div>
                <div class="nav-lavel">Event</div>
                <div class="nav-item @yield('events-index-active')">
                    <a href="{{ route('organizer.events.index') }}"><i class="ik ik-calendar"></i><span>Events</span></a>
                </div>
                <div class="nav-item @yield('events-create-active')">
                    <a href="{{ route('organizer.events.create') }}"><i class="ik ik-plus"></i><span>Create Event</span></a>
                </div>
                <div class="nav-item @yield('tickets-sold-active')">
                    <a href="{{ route('organizer.tickets') }}"><i class="ik ik-tablet"></i><span>Ticket Sold</span></a>
                </div>
                <div class="nav-lavel">Profile</div>
                <div class="nav-item @yield('profile-index-active')">
                    <a href="{{ route('organizer.profile.index') }}"><i class="ik ik-user"></i><span>My Profile</span></a>
                </div>
                <div class="nav-item @yield('profile-edit-active')">
                    <a href="{{ route('organizer.profile.update') }}"><i class="fa fa-user-edit"></i><span>Edit Profile</span></a>
                </div>
                <div class="nav-lavel">Need Help?</div>
                <div class="nav-item @yield('faq-active')">
                    <a href="{{ route('organizer.faq') }}"><i class="ik ik-help-circle"></i><span>FAQ</span></a>
                </div>
                <div class="nav-item @yield('contact-us-active')">
                    <a href="{{ route('organizer.contact.us') }}"><i class="fa fa-envelope"></i><span>Send us a message</span></a>
                </div>

                <div class="nav-lavel">Logout</div>
                <div class="nav-item">
                    <a href="{{ route('organizer.logout') }}"><i class="ik ik-power"></i><span>Logout</span></a>
                </div>
            </nav>
        </div>
    </div>
</div>
