<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>@yield('title') | TekTicket Administrator </title>
    <!-- Bootstrap -->
    <link href="{{ asset('assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('assets/admin/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('assets/admin/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('assets/admin/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="{{ asset('assets/admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('assets/admin/vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('assets/admin/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css') }}" rel="stylesheet">
    <!-- Summernote -->
    <link href="{{ asset('assets/admin/vendors/summernote-0.8.16-dist/summernote-bs4.min.css') }}" rel="stylesheet">

    <!-- Datatables -->
    <link href="{{ asset('assets/admin/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('assets/admin/build/css/custom.min.css') }}" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">

        <!-- side bar -->
        @include('backend.includes.sidebar')
        <!-- side bar -->

        <!-- top navigation -->
        @include('backend.includes.header')
        <!-- /top navigation -->

        <!-- page content -->
        @yield('body')
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                ©{{ now()->format('Y') }} All Rights Reserved. TekTicket. Privacy and Terms
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="{{ asset('assets/admin/vendors/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('assets/admin/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('assets/admin/vendors/fastclick/lib/fastclick.js') }}"></script>
<!-- NProgress -->
<script src="{{ asset('assets/admin/vendors/nprogress/nprogress.js') }}"></script>
<!-- Chart.js -->
<script src="{{ asset('assets/admin/vendors/Chart.js/dist/Chart.min.js') }}"></script>
<!-- gauge.js -->
<script src="{{ asset('assets/admin/vendors/gauge.js/dist/gauge.min.js') }}"></script>
<!-- bootstrap-progressbar -->
<script src="{{ asset('assets/admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('assets/admin/vendors/iCheck/icheck.min.js') }}"></script>
<!-- Skycons -->
<script src="{{ asset('assets/admin/vendors/skycons/skycons.js') }}"></script>
<!-- Datatables -->
<script src="{{ asset('assets/admin/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/summernote-0.8.16-dist/popper.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/summernote-0.8.16-dist/summernote-bs4.min.js') }}"></script>

<!-- bootstrap-daterangepicker -->
<script src="{{ asset('assets/admin/vendors/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- bootstrap-datetimepicker -->
<script src="{{ asset('assets/admin/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>

<!-- Custom Theme Scripts -->
<script src="{{ asset('assets/admin/build/js/custom.min.js') }}"></script>

@stack('page-script')

</body>
</html>
