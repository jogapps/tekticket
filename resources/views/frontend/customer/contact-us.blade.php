<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organizer | TekTicket</title>
    <link rel="stylesheet" href="{{ asset('assets/frontend/customer/assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/customer/assets/css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/customer/assets/css/fontawesome5/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/customer/assets/css/style.css') }}">

    <style>
        .container-fluid {
            padding-right: 0;
            padding-left: 0;
            margin-right: auto;
            margin-left: auto;
        }

        .dropdown-menu{
            margin: 0px;
            padding: 0px;
        }

        .dropdown-item{
            padding-top: 0;
        }
    </style>
</head>

<body>

@include('frontend.customer.includes.header')
<!-- end of header section -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
    </ol>
</nav>
<main class="large-screen-padding">
    <div class="container-fluid account-overview my-5">
        <h1 class="h1 font-w d-none d-md-block">Contact Us</h1>
        <h4 class="h4 font-w d-md-none">Contact Us</h4>
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="card-divs mt-4">

                    <!-- For viewport less than medium (768px) -->
                    <div class="d-md-none mb-3">
                        <div class="row px-3">
                            <div class="col-sm-9 col-6 pl-">
                                <h2 class="h5 font-w  pt-3">Contact Us</h2>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="row px-3">
                            <div class="col-9">
                                <small class="grey-theme">Email Address</small><br>
                                <p>{{ 'auth()->user()->email' }}</p>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="row px-3">
                            <div class="col-sm-8 col-5">
                                <small class="grey-theme">Phone Number</small><br>
                                <p>{{ 'Not provided' }} <br>
                            </div>
                        </div>
                    </div>
                    <!-- For viewport less than medium (768px) ends -->

                    <!-- For viewport larger than medium (768px)-->
                    <div class="d-none d-md-block">
                        <div class="dropdown-divider"></div>
                        <div class="text-left pl-4 py-1">
                            <small class="grey-theme">Email Address</small><br>
                            <p>{{ $information->email }}<br>
                            </p>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="text-left pl-4 py-1">
                            <small class="grey-theme">Phone Number</small><br>
                            <p>{{ $information->phone_1 }}<br>
                            </p>
                        </div>
                    </div>
                    <!-- For viewport larger than medium (768px) ends -->
                </div>
                <div class="card-divs mt-4 p-4 d-none d-md-block">
                    <h5 class="h5 pb-3">We're here to help</h5>
                    <p>For any enquiry, You can send us an email at {{ $information->email }}</p>
                    <p>Call Us <i class="fa fa-phone"></i> :  <a href="#"> {{ $information->phone_1 }}</a> </p>
                </div>
            </div>
            <div class="col-lg-9 col-md-8 px-">
                @include('frontend.customer.includes.alert')
                <section class="large-screen-padding main-content-section">
                    <div class="container-fluid mt-3">
                        <div class="row mx-auto">


                            <div class="col-12">
                                <form action="{{ route('contact.us.send.message') }}" method="post">
                                    @honeypot
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label class="label-align" for="name">Name</label>
                                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>
                                            @error('name')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="label-align" for="phone">Phone Number(Optional)</label>
                                            <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}">
                                            @error('phone')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="label-align" for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                                        @error('email')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="label-align" for="subject">Subject</label>
                                        <input type="text" class="form-control" id="subject" name="subject" value="{{ old('subject') }}">
                                        @error('subject')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="label-align" for="message">Message</label>
                                        <textarea rows="5" name="message" id="message" class="form-control">{{ old('message') }}</textarea>
                                        @error('message')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-outline-success">Send Message <i class="fa fa-check"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</main>

<div class="container-fluid">
    @include('frontend.customer.includes.footer')
</div>

<script src="{{ asset('assets/frontend/customer/assets/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/frontend/customer/assets/js/custom.js') }}"></script>
<script src="{{ asset('assets/frontend/customer/assets/js/bootstrapjs/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/frontend/customer/assets/js/countries/dist/countries.js') }}"></script>
</body>

</html>
