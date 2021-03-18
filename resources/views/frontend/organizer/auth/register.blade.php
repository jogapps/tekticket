@extends('frontend.organizer.auth.layout.default')
@section('title', 'New User? Register')

@section('body')
    <div class="container-fluid h-100">
        <div class="row flex-row h-100 bg-white">
            <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                <div class="lavalite-bg" style="background-image: url('{{ asset("assets/frontend/customer/assets/images/event-bg.jpg") }}')">
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                <div class="authentication-form mx-auto">
                    <div class="logo-centered">
                        <a href="{{ route('home') }}">
                            <img width="100" src="{{ asset('assets/frontend/organizer/img/tek-tickets.png') }}" alt="">
                        </a>
                    </div>
                    <h3>Register as an Event Organizer</h3>
                    <form action="{{ route('organizer.register') }}" method="post">
                        @honeypot
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Organization Name" required="" name="name" value="{{ old('name') }}">
                            <i class="ik ik-user"></i>
                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email" required="" name="email" value="{{ old('email') }}">
                            <i class="ik ik-mail"></i>
                            @error('email')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Phone Number" required="" name="phone" value="{{ old('phone') }}">
                            <i class="ik ik-phone"></i>
                            @error('phone')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" required="" name="password">
                            <i class="ik ik-lock"></i>
                            @error('password')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Retype Password" name="password_confirmation">
                            <i class="ik ik-lock"></i>
                        </div>
                        <div class="row">
                            <div class="col text-left">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" required class="custom-control-input" id="item_checkbox" name="term" value="1">
                                    <span class="custom-control-label">
                                        I agree to the <a class="text-primary" target="_blank" href="{{ route('page', ['keyword' => 'privacy-and-policy']) }}">terms and policy</a>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="sign-btn text-center">
                            <button type="submit" class="btn btn-theme">Register</button>
                        </div>
                    </form>
                    <div class="register">
                        <p>Already have an account? <a class="text-primary" href="{{ route('organizer.login') }}">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
