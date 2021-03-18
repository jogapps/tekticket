@extends('frontend.organizer.layout.default')
@section('title', 'Contact Us')
@section('contact-us-active', 'active')
@section('body')
    <div class="main-content">
            @include('frontend.customer.includes.alert')
            <div class="row clearfix justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">
                              Contact Us
                            </h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('organizer.contact.us') }}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-md-1" for="subject">Subject <span class="text-danger">*</span></label>
                                   <div class="col-md-8">
                                       <input type="text" value="{{ old('subject') }}" placeholder="Subject" name="subject" id="subject" class="form-control" required>
                                   </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-1" for="message">Message <span class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <textarea name="message" id="message" rows="5" class="form-control" required>{{ old('message') }}</textarea>
                                        <br/>
                                        <button type="submit" class="btn btn-info btn-lg">Send <i class="fa fa-envelope"></i> </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
