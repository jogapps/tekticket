@extends('frontend.customer.profile.layout.default')
@section('title', 'Edit Profile')
@push('custom-script')
    <script>
        document.addEventListener("load", loadCountries('{{ auth()->user()->state }}'));
    </script>
@endpush
@section('body')
    <div class="container-fluid account-overview my-5">
        <h1 class="h1 font-w d-none d-md-block">Account Overview</h1>
        <h4 class="h4 font-w d-md-none">Account Overview</h4>
        @include('frontend.customer.includes.alert')
        <div class="row">
            @include('frontend.customer.profile.partial.sidebar')
            <div class="col-lg-9 col-md-8 px-">
                <a href="{{ route('profile.index') }}" class="btn btn-sm btn-outline-info float-right"><i class="fa fa-arrow-left"></i> Back to profile</a>
                <h5 class="my-4">Edit Profile
                </h5>
                <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class=" justify-content-center">
                        <div class="">
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="name" class="col-form-label">Fullname: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="{{ auth()->user()->name }}" name="name" id="name" required>
                                    @error('name')
                                    <span class="text-danger" style="word-wrap: break-word;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="profile_image" class="col-form-label">Profile Image: </label>
                                    <input type="file" class="form-control" name="profile_image" id="profile_image">
                                    @error('profile_image')
                                    <span class="text-danger" style="word-wrap: break-word;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label for="address" class="col-form-label">Address:</label>
                                    <textarea name="address" id="address" class="form-control" rows="2">{{ auth()->user()->address }}</textarea>
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
                                    <input type="text" class="form-control" value="{{ auth()->user()->city }}" name="city" id="city">
                                    @error('city')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="phone" class="col-form-label">Phone:</label>
                                    <input type="text" class="form-control" value="{{ auth()->user()->phone }}" name="phone" id="phone">
                                    @error('phone')
                                    <span class="text-danger" style="word-wrap: break-word;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12">
                                    <button type="submit" class="my-3 col-12 col-md-2 btn btn-success proceed">Update Profile <i class="fa fa-check"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
