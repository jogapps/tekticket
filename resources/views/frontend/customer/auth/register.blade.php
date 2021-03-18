@extends('frontend.customer.auth.layout.default')
@section('title','New User? Sign Up!')

@section('body')
    <div class="row full-screen">
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
                    <div class="col-12">
                        <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- hide on small screen ends here -->
        <div class="col-12 col-md-12 col-lg-7 add-padding">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 id="sign-in-text">Sign Up</h2>

                    <small>Pls fill all required fields (<span class="text-danger">*</span>).</small>
                </div>
            </div>
            <form action="{{ route('register') }}" method="post">
                @honeypot
                @csrf
                <div class="row justify-content-center">
                    <div class="col-12">
                        @include('frontend.customer.includes.alert')
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="name" class="col-form-label">Fullname: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="{{ old('name') }}" name="name" id="name" required>
                                @error('name')
                                    <span class="text-danger" style="word-wrap: break-word;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="email" class="col-form-label">Email: <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" value="{{ old('email') }}" name="email" id="email" required>
                                @error('email')
                                    <span class="text-danger" style="word-wrap: break-word;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="password" class="col-form-label">Password: <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="password" id="password" required>
                                @error('password')
                                    <span class="text-danger" style="word-wrap: break-word;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="password_confirmation" class="col-form-label">Retype Password: <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
                                @error('password_confirmation')
                                    <span class="text-danger" style="word-wrap: break-word;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="address" class="col-form-label">Address:</label>
                                <textarea name="address" id="address" class="form-control" rows="2">{{ old('address') }}</textarea>
                                @error('address')
                                    <span class="text-danger" style="word-wrap: break-word;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row" data-toggle-group="location">
                            <div class="form-group col-6">
                                <label for="country" class="col-form-label">Country: </label>
                                <select class="form-control" id="country" name="country" data-toggle="country" data-country=""></select>
                            </div>
                            <div class="form-group col-6">
                                <label for="state" class="col-form-label">State:</label>
                                <select class="form-control" id="state" name="state" data-toggle="state" data-state=""></select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="city" class="col-form-label">City:</label>
                                <input type="text" class="form-control" value="{{ old('city') }}" name="city" id="city">
                                @error('city')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="phone" class="col-form-label">Phone:</label>
                                <input type="text" class="form-control" value="{{ old('phone') }}" name="phone" id="phone">
                                @error('phone')
                                    <span class="text-danger" style="word-wrap: break-word;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12">
                                <input @if(old('terms')) @endif type="checkbox" class="" name="terms" value="1" required><span class="text-danger">*</span>
                                By checking this box, you agree to the <span class="terms-policy"> <a href="#">Terms of Use</a> </span>. and understand that information will be used as described in
                                our <span class="terms-policy"> <a href="#">Privacy Policy</a> </span>
                                @error('terms')
                                    <span class="text-danger" style="word-wrap: break-word;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12">
                                <button type="submit" class="my-3 col-12 col-md-2 btn button-color proceed">Register</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
