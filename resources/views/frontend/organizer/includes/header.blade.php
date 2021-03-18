<header class="header-top" header-theme="light">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <div class="top-menu d-flex align-items-center">
                <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                <button type="button" id="navbar-fullscreen" class="nav-link"><i class="ik ik-maximize"></i></button>
            </div>
            <div class="top-menu d-flex align-items-center">
               {{-- <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="notiDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-bell"></i>
                        <span class="badge bg-danger">{{ auth()->user()->unreadNotifications()->count() }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right notification-dropdown" aria-labelledby="notiDropdown">
                        <h4 class="header">Notifications</h4>
                        <div class="notifications-wrap">
                            @forelse(auth()->user()->unreadNotifications as $notification)
                                <a href="{{ $notification->data['link'] }}" class="media">
                                    <span class="d-flex">
                                        <i class="ik ik-check"></i>
                                    </span>
                                    <span class="media-body">
                                        <span class="heading-font-family media-heading">{{ $notification->data['event_title'] }}</span>
                                        <span class="media-content">{{ Str::limit($notification->data['message']) }}</span>
                                    </span>
                                </a>
                            @empty
                                <a href="#" class="media text-center">
                                    <span class="media-body">
                                        <span class="heading-font-family media-heading">No New Notification</span>
                                    </span>
                                </a>
                            @endforelse
                        </div>
                        <div class="footer"><a href="javascript:void(0);">See all activity</a></div>
                    </div>
                </div>--}}
                <button type="button" class="nav-link ml-10" id="apps_modal_btn" data-toggle="modal" data-target="#appsModal"><i class="ik ik-grid"></i></button>
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar" src="img/user.jpg" alt=""></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{ route('organizer.profile.index') }}"><i class="ik ik-user dropdown-icon"></i> Profile</a>
                        <a class="dropdown-item" href="{{ route('organizer.events.index') }}"><i class="ik ik-calendar dropdown-icon"></i> Events</a>
                        <a class="dropdown-item" href="{{ route('organizer.logout') }}"><i class="ik ik-power dropdown-icon"></i> Logout</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
