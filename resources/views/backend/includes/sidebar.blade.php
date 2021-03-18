<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ route('backend.dashboard.index') }}" class="site_title"><i class="fa fa-paw"></i> <span>TekTicket</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{ asset('uploads/users/default.png') }}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ auth()->user()->name }}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li>
                        <a href="{{ route('backend.dashboard.index') }}"><i class="fa fa-home"></i> Home </a>
                    </li>
                    <li>
                        <a href="{{ route('backend.administrator.index') }}"><i class="fa fa-users"></i> Administrators</a>
                    </li>
                    <li>
                        <a href="{{ route('backend.user.index') }}"><i class="fa fa-user"></i> Users </a>
                    </li>
                    <li>
                        <a href="{{ route('backend.organizers.index') }}"><i class="fa fa-users"></i> Organizers </a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-calendar"></i> Events  <span class="fa fa-chevron-down"></span</a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('backend.events.index') }}">Listing</a> </li>
                            <li><a href="{{ route('backend.events.create') }}">Create Event</a> </li>
                        </ul>
                    </li>
                    <li><a href="{{ route('backend.ticket.index') }}"><i class="fa fa-ticket"></i> Tickets</a></li>
                    <li><a><i class="fa fa-credit-card-alt"></i> Wallet & Voucher <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('backend.wallet.index') }}">Wallet</a></li>
                            <li><a href="{{ route('backend.voucher.index') }}">Voucher</a></li>
                            <li><a href="{{ route('backend.wallet.config') }}">Wallet Config</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-file"></i> CMS <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('backend.blog.index') }}">Blog</a></li>
                            <li><a href="{{ route('backend.pages.index') }}">Pages</a></li>
                            <li><a href="{{ route('backend.help.index') }}">Help</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('backend.faqs.index') }}"><i class="fa fa-comment"></i> FAQ</a>
                    </li>
                    <li>
                        <a href="{{ route('backend.menu.index') }}"><i class="fa fa-clone"></i> Menus and Category</a>
                    </li>
                </ul>
            </div>
            <div class="menu_section">
                <h3>More</h3>
                <ul class="nav side-menu">
                    <li>
                        <a href="{{ route('backend.other-information.index') }}"><i class="fa fa-globe"></i> Other Information</a>
                    </li>
                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('backend.logout') }}">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>
