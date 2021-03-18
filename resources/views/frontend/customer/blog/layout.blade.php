<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | TekTicket</title>
    <link rel="stylesheet" href="{{ asset('assets/frontend/customer/assets/css/orders.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/customer/assets/css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/customer/assets/css/fontawesome5/css/all.min.css') }}">

    <style>
        .container-fluid {
            padding-right: 0;
            padding-left: 0;
            margin-right: auto;
            margin-left: auto;
        }

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
@include('frontend.customer.includes.header')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
    </ol>
</nav>
<main>
    <!-- main section of the body here -->
    <section class="large-screen-padding main-content-section">
        <div class="container-fluid ">
            <div class="row my-5 mx-auto">
                <div class="col-12">
                    @yield('body')
                </div>
            </div>
        </div>
    </section>
</main>

<div class="container-fluid">
    @include('frontend.customer.includes.footer')
</div>

<script src="{{ asset('assets/frontend/customer/assets/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/frontend/customer/assets/js/custom.js') }}"></script>
<script src="{{ asset('assets/frontend/customer/assets/js/bootstrapjs/bootstrap.min.js') }}"></script>

</body>

</html>
