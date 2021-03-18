@extends('frontend.organizer.layout.default')
@section('title', 'Contact Us')
@section('contact-us-active', 'active')

@section('body')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12">
                    <form method="post" enctype="multipart/form-data" action="{{ route('organizer.send.message') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-8 col-sm-12">
                                <label for="name">Title</label>
                                <input type="text" name="name" value="{{ auth()->user()->name }}" class="form-control" id="name" readonly required>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-8 col-sm-12">
                                <label for="email">Email</label>
                                <input type="text" name="email" value="{{ auth()->user()->email }}" class="form-control" id="email" readonly required>
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                                <label for="name">Title</label>
                                <input type="text" name="name" value="{{ auth()->user()->name }}" class="form-control" id="name" readonly required>
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label for="email">Email</label>
                                <input type="text" name="email" value="{{ auth()->user()->email }}" class="form-control" id="email" readonly required>
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                                <label for="name">Title</label>
                                <input type="text" name="name" value="{{ auth()->user()->name }}" class="form-control" id="name" readonly required>
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label for="email">Email</label>
                                <input type="text" name="email" value="{{ auth()->user()->email }}" class="form-control" id="email" readonly required>
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
