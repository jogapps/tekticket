@extends('frontend.organizer.layout.default')
@section('title', 'Profile Update')
@section('profile-edit-active', 'active')

@push('page-script')
    <script>
        document.addEventListener("load", loadCountries('{{ auth()->user()->state }}'));
        $(".summernote").summernote({
            height:300,
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ]
        });
    </script>
@endpush

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
                                <h5>Update profile</h5>
                                <span>Update profile</span>
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
                                <li class="breadcrumb-item active" aria-current="page">Update</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><h3>Profile details</h3></div>
                        <div class="card-body">
                            <form class="forms-sample" action="{{ route('organizer.profile.update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-md-6 col-xs-12">
                                        <label for="name">Organization Name</label>
                                        <input type="text" class="form-control" value="{{ auth()->user()->name }}" required id="name" name="name" placeholder="Organization Name">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" value="{{ auth()->user()->phone }}" id="phone" name="phone" placeholder="Phone" required>
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea class="form-control" name="address" id="address">{{ auth()->user()->address }}</textarea>
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-row row" data-toggle-group="location">
                                    <div class="form-group col-6">
                                        <label for="country" class="col-form-label">Country: </label>
                                        <select class="form-control" id="country" name="country" data-toggle="country" data-country=""></select>
                                        @error('country')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="state" class="col-form-label">State:</label>
                                        <select class="form-control" id="state" name="state" data-toggle="state" data-state=""></select>
                                        @error('state')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="form-group col-6">
                                        <label for="city" class="col-form-label">City: </label>
                                        <input type="text" id="city" name="city" value="{{ auth()->user()->city }}" class="form-control">
                                        @error('city')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <div class="row">
                                            <div class="col-8">
                                                <label for="country" class="col-form-label">Profile Image: (Optional) </label>
                                                <input type="file" name="profile_image" class="form-control">
                                            </div>
                                            <div class="col-4">
                                                <img class="img-fluid" width="200" src="{{ auth()->user()->profile_image }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4 col-xs-12">
                                        <label for="facebook">Facebook (optional)</label>
                                        <input type="text" class="form-control" value="{{ auth()->user()->facebook }}" id="facebook" name="facebook" placeholder="Example: https://facebook.com/example">
                                        @error('facebook')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 col-xs-12">
                                        <label for="twitter">Twitter (optional)</label>
                                        <input type="text" class="form-control" value="{{ auth()->user()->twitter }}" id="twitter" name="twitter" placeholder="Example: https://twitter.com/example">
                                        @error('twitter')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 col-xs-12">
                                        <label for="instagram">Instagram (optional)</label>
                                        <input type="text" class="form-control" value="{{ auth()->user()->instagram }}" id="instagram" name="instagram" placeholder="Example: https://instagram.com/example">
                                        @error('instagram')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="form-group col-12">
                                        <label for="description" class="col-form-label">Description about your organization: (Optional) </label>
                                        <textarea name="description" id="description" class="summernote"></textarea>
                                        @error('description')
                                            <span class="text-danger">{{ auth()->user()->description }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
