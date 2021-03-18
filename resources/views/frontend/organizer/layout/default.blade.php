<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title', 'Organizer Dashboard') - TekTicket</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="favicon.ico" type="image/x-icon" />

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/frontend/organizer/plugins/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/organizer/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/organizer/plugins/icon-kit/dist/css/iconkit.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/organizer/plugins/ionicons/dist/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/organizer/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/organizer/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/organizer/plugins/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/organizer/plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/organizer/plugins/weather-icons/css/weather-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/organizer/plugins/c3/c3.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/organizer/plugins/owl.carousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/organizer/plugins/owl.carousel/dist/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/organizer/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/organizer//plugins/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/organizer/dist/css/theme.min.css') }}">
    <script src="{{ asset('assets/frontend/organizer/src/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('assets/admin/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css') }}" rel="stylesheet">
    <!-- Notification -->
    <link href="{{ asset('assets/frontend/organizer/plugins/notification/css/hullabaloo.min.css') }}" rel="stylesheet"/>
</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div class="wrapper">
    @include('frontend.organizer.includes.header')

    <div class="page-wrap">
        @include('frontend.organizer.includes.sidebar')
        @yield('body')
        <footer class="footer">
            <div class="w-100 clearfix">
                <span class="text-center text-sm-left d-md-inline-block">Copyright © {{ now()->format('Y') }} TekTicket. All Rights Reserved.</span>
            </div>
        </footer>

    </div>
</div>



<div class="modal fade apps-modal" id="appsModal" tabindex="-1" role="dialog" aria-labelledby="appsModalLabel" aria-hidden="true" data-backdrop="false">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ik ik-x-circle"></i></button>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="quick-search">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 ml-auto mr-auto">
                            <div class="input-wrap">
                                <input type="text" id="quick-search" class="form-control" placeholder="Search..." />
                                <i class="ik ik-search"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-body d-flex align-items-center">
                <div class="container">
                    <div class="apps-wrap">
                        <div class="app-item">
                            <a href="{{ route('organizer.dashboard') }}"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                        </div>
                        <div class="app-item">
                            <a href="{{ route('organizer.profile.index') }}"><i class="ik ik-user"></i><span>Profile</span></a>
                        </div>
                        <div class="app-item">
                            <a href="{{ route('organizer.profile.update') }}"><i class="ik ik-user-plus"></i><span>Edit Profile</span></a>
                        </div>
                        <div class="app-item">
                            <a href="{{ route('organizer.events.index') }}"><i class="ik ik-calendar"></i><span>Events</span></a>
                        </div>
                        <div class="app-item">
                            <a href="{{ route('organizer.events.create') }}"><i class="ik ik-plus"></i><span>Create Event</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>window.jQuery || document.write('<script src="{{ asset('assets/frontend/organizer/src/js/vendor/jquery-3.3.1.min.js') }}"><\/script>')</script>
<script src="{{ asset('assets/frontend/organizer/plugins/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('assets/frontend/organizer/plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/frontend/organizer/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/frontend/organizer/plugins/screenfull/dist/screenfull.js') }}"></script>
<script src="{{ asset('assets/frontend/organizer/plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/frontend/organizer/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/frontend/organizer/plugins/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/frontend/organizer/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/frontend/organizer/plugins/jvectormap/jquery-jvectormap.min.js') }}"></script>
<script src="{{ asset('assets/frontend/organizer/plugins/moment/moment.js') }}"></script>
<script src="{{ asset('assets/frontend/organizer/plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="{{ asset('assets/frontend/organizer/plugins/d3/dist/d3.min.js') }}"></script>
<script src="{{ asset('assets/frontend/organizer/plugins/c3/c3.min.js') }}"></script>
<script src="{{ asset('assets/frontend/organizer/js/tables.js') }}"></script>
<script src="{{ asset('assets/frontend/organizer/js/widgets.js') }}"></script>
<script src="{{ asset('assets/frontend/organizer/js/charts.js') }}"></script>
<script src="{{ asset('assets/frontend/organizer/js/custom.js') }}"></script>
<script src="{{ asset('assets/frontend/organizer/plugins/summernote/dist/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('assets/frontend/organizer/dist/js/theme.min.js') }}"></script>
<script src="{{ asset('assets/frontend/organizer/plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/frontend/organizer/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/frontend/customer/assets/js/countries/dist/countries.js') }}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{ asset('assets/admin/vendors/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- Notification -->
<script src="{{ asset('assets/frontend/organizer/plugins/notification/js/hullabaloo.min.js') }}"></script>

@stack('page-script')
</body>
</html>
