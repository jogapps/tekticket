<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | TekTicket</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.semanticui.min.css">
    <link rel="stylesheet" href="{{ asset('assets/frontend/customer/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/customer/assets/css/subscriptions.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/customer/assets/css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/customer/assets/css/fontawesome5/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/customer/assets/css/newsletter.css') }}">


    <style>
        .container-fluid {
            padding-right: 0;
            padding-left: 0;
            margin-right: auto;
            margin-left: auto;
        }
    </style>
</head>

<body>

@include('frontend.customer.includes.header')
<!-- end of header section -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
    </ol>
</nav>
<main class="large-screen-padding">
    @yield('body')
</main>

<div class="modal fade" id="newsletterModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Subscribe to our Newsletter</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <i class="float-right fa fa-close"></i>
                <div class="newsletter container-fluid">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 mx-auto">
                            <div class="card p-4 px-5">
                                <h2 class="font-weight-bold text-white">Stay tuned</h2>
                                <h6 class="text-black-50 mb-5 text-color">Subscribe to our newsletter and never miss our latest news, designs, and product updates.</h6>
                                <form action="{{ route('newsletter.subscribe') }}" method="post">
                                    @csrf
                                    <div class="form-group bg-white border rounded px-2 py-2 mb-2">
                                        <div class="row">
                                            <div class="col"> <input type="email" name="email" class="form-control pl-3 shadow-none bg-transparent border-0" placeholder="Enter your email address"> </div>
                                            <div class="col-auto"> <button type="submit" class="btn btn-block btn-dark"><i class="fa fa-paper-plane-o mr-2"></i>Get notified <i class="fa fa-arrow-right"></i></button> </div>
                                        </div>
                                    </div>
                                </form>
                                <span class="mb-4 text-color">No spam, notifications about events around you.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    @include('frontend.customer.includes.footer')
</div>

<script src="{{ asset('assets/frontend/customer/assets/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/frontend/customer/assets/js/custom.js') }}"></script>
<script src="{{ asset('assets/frontend/customer/assets/js/bootstrapjs/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/frontend/customer/assets/js/countries/dist/countries.js') }}"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.semanticui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>


@stack('custom-script')
</body>

</html>
