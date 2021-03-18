<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | TekTicket</title>

    <link rel="stylesheet" href="{{ asset('assets/frontend/customer/assets/css/orders.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/customer/assets/css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/customer/assets/css/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/customer/assets/css/fontawesome5/css/all.min.css') }}">

    <style>
        @media only screen and (min-width: 992px){
            body {
                height: 100%;
                background-image: url('{{ asset('assets/frontend/customer/assets/images/event-bg.jpg') }}');
                background-repeat: repeat;
                background-size:contain;
            }
        }
    </style>
</head>

<body>
@include('frontend.customer.includes.header')

<div class="container-fluid main">
    @yield('body')
</div>


<script src="{{ asset('assets/frontend/customer/assets/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/frontend/customer/assets/js/custom.js') }}"></script>
<script src="{{ asset('assets/frontend/customer/assets/js/bootstrapjs/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/frontend/customer/assets/js/countries/dist/countries.js') }}"></script>
<script>
    document.addEventListener("load", loadCountries());
</script>
</body>
</html>
