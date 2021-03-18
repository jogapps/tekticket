@extends('frontend.customer.auth.layout.default')
@section('title','Forgot Password? Reset it!')

@section('body')
    <div class="row full-screen flex">
        <!-- hide this on small screen  -->
        <div class="col-lg-5 side-bg absolute-div">
            <div class="divider" style="border-right: 2px solid #c8cbcf; height: 100%; padding: 0 5px;">
                <div class="row">
                    <div class="col-12 text-on-image">
                        <h1 class="page-desc">Welcome Back</h1>
                        <p id="welcome-back-note">
                            Discover millions of events, get alerts
                            about your favorite artists, teams, plays
                            more — plus always- secure, effortless ticketing.
                        </p>
                        <p>
                            Unsplash is a website dedicated to sharing stock photography
                            under the Unsplash license. The website claims over 110,000
                            contributing photographers and generates more than 11 billion photo
                            impressions per month on their growing library of over 1.5 million
                        </p>
                    </div>
                    <div class="col-4 hr-class">
                        <hr>
                        <img src="{{ asset('assets/frontend/customer/assets/images/tek-tickets.jpg') }}" alt="logo" width="70" height="70">
                    </div>
                </div>
            </div>
        </div>
        <!-- hide on small screen ends here -->
        <div class="col-12 col-md-12 col-lg-7 add-padding" style="margin-top: 15%;">
            <div class="row justify-content-center">
                <div class="col-11">
                    <h2 id="sign-in-text">Forgot Password? Enter Email</h2>
                    <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
                </div>
            </div>
            <form action="{{ route('password.email') }}" method="post">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-11">
                        @include('frontend.customer.includes.alert')
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="email" class="col-form-label">Email Address</label>
                                <input type="email" class="form-control" name="email" id="email" required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="my-3 col-12 col-md-2 btn button-color proceed">Reset</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
