@extends('frontend.organizer.auth.layout.default')
@section('title', 'Reset Password!')

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
                        <img width="100" src="{{ asset('assets/frontend/organizer/img/tek-tickets.png') }}" alt="">
                    </div>
                    @include('frontend.customer.includes.alert')
                    <h3>Enter Password</h3>
                    <form action="{{ route('organizer.password.update') }}" method="post">
                        <input type="hidden" name="token" value="{{ $token }}">
                        @csrf
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email" value="{{ $email }}" required name="email">
                            <i class="ik ik-mail"></i>
                            @error('email')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="New Password" required="" name="password">
                            <i class="ik ik-lock"></i>
                            @error('password')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Retype Password" required="" name="password_confirmation">
                            <i class="ik ik-lock"></i>
                        </div>
                        <div class="sign-btn text-center">
                            <button class="btn btn-theme">Reset</button>
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
