@extends('frontend.organizer.auth.layout.default')
@section('title', 'Forgot Password? Reset it!')

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
                    <h3>Forgot Password? Enter Email</h3>
                    <form action="{{ route('organizer.password.email') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Email" required="" name="email">
                            <i class="ik ik-user"></i>
                            @error('email')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
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
