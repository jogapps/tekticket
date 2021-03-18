@extends('frontend.organizer.auth.layout.default')
@section('title', 'Already have an account? Login as vendor')

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
                    @include('frontend.customer.includes.alert')
                    <h3>Sign In to TekTicket (Organizer)</h3>
                    <form action="{{ route('organizer.login') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Email" required="" name="email" value="{{ old('email') }}">
                            <i class="ik ik-user"></i>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" required="" name="password">
                            <i class="ik ik-lock"></i>
                        </div>
                        <div class="row">
                            <div class="col text-left">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="item_checkbox" name="item_checkbox" value="option1">
                                    <span class="custom-control-label">&nbsp;Remember Me</span>
                                </label>
                            </div>
                            <div class="col text-right">
                                <a class="text-primary" href="{{ route('organizer.password.request') }}">Forgot Password ?</a>
                            </div>
                        </div>
                        <div class="sign-btn text-center">
                            <button class="btn btn-theme">Sign In</button>
                        </div>
                    </form>
                    <div class="register">
                        <p>Don't have an account? <a class="text-primary"  href="{{ route('organizer.register') }}">Create an account</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
