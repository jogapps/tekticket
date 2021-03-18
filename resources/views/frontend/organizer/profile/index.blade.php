@extends('frontend.organizer.layout.default')
@section('title', 'Profile')
@section('profile-index-active', 'active')

@section('body')
    <div class="main-content">
        <div class="container-fluid">
            @include('frontend.customer.includes.alert')
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="ik ik-file-text bg-blue"></i>
                            <div class="d-inline">
                                <h5>Profile</h5>
                                <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <nav class="breadcrumb-container" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('organizer.dashboard') }}"><i class="ik ik-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('organizer.profile.index') }}">Profile</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Index</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{ auth()->user()->profile_image }}" width="250">
                                <h4 class="card-title mt-10">{{ auth()->user()->name }}</h4>
                                <p class="card-subtitle">Event organizer</p>
                                <div class="row text-center justify-content-md-center">
                                    <div class="col-4"><a href="javascript:void(0)" class="link"><i class="ik ik-calendar"></i> Events: <font class="font-medium">{{ auth()->user()->events()->count() }}</font></a></div>
                                    <div class="col-4"><a href="javascript:void(0)" class="link"><i class="ik ik-image"></i> <font class="font-medium">54</font></a></div>
                                </div>
                            </div>
                        </div>
                        <hr class="mb-0">
                        <div class="card-body">
                            <small class="text-muted d-block">Email address </small>
                            <h6>{{ auth()->user()->email }}</h6>
                            <small class="text-muted d-block pt-10">Phone</small>
                            <h6>{{ auth()->user()->phone }}</h6>
                            <small class="text-muted d-block pt-10">Address</small>
                            <h6>{{ auth()->user()->address }}</h6>
                            {{--<div class="map-box">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d248849.886539092!2d77.49085452149588!3d12.953959988118836!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae1670c9b44e6d%3A0xf8dfc3e8517e4fe0!2sBengaluru%2C+Karnataka!5e0!3m2!1sen!2sin!4v1542005497600" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen=""></iframe>
                            </div>--}}
                            <small class="text-muted d-block pt-30">Social Profile</small>
                            <br>
                            <a href="{{ auth()->user()->facebook }}" target="_blank" class="btn btn-icon btn-facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="{{ auth()->user()->twitter }}" target="_blank" class="btn btn-icon btn-twitter"><i class="fab fa-twitter"></i></a>
                            <a href="{{ auth()->user()->instagram }}" target="_blank" class="btn btn-icon btn-instagram"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="card">
                        <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="pills-profile-tab" data-toggle="pill" href="#last-month" role="tab" aria-controls="pills-profile" aria-selected="true">Profile</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade active show" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3 col-6"> <strong>Organization Name</strong>
                                            <br>
                                            <p class="text-muted">{{ auth()->user()->name }}</p>
                                        </div>
                                        <div class="col-md-3 col-6"> <strong>Phone</strong>
                                            <br>
                                            <p class="text-muted">{{ auth()->user()->phone }}</p>
                                        </div>
                                        <div class="col-md-3 col-6"> <strong>City</strong>
                                            <br>
                                            <p class="text-muted">{{ auth()->user()->city }}</p>
                                        </div>
                                        <div class="col-md-3 col-6"> <strong>Location</strong>
                                            <br>
                                            <p class="text-muted">{{ auth()->user()->state }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <h4 class="mt-30">Profile Description</h4>
                                    {!! auth()->user()->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
