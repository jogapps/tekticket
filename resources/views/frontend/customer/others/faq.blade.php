@extends('frontend.customer.others.layout')
@section('title', 'FAQ')

@section('body')
    <!-- main section of the body here -->
    <section class="main-content-section">
        <div class="container">
        @include('frontend.customer.includes.alert')
            <div class="content-x">
                <div class="content-x-panel">
                    <div class="row">
                        <div class="col-md-8">
                            <div id="accordion">
                                @foreach($faqs as $faq)
                                    <div class="card">
                                        <div class="card-header" id="heading{{$faq->id}}">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$faq->id}}" aria-expanded="true" aria-controls="collapse{{$faq->id}}">
                                                    {{ $faq->title }}
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapse{{$faq->id}}" class="collapse @if($loop->first) show @endif" aria-labelledby="heading{{$faq->id}}" data-parent="#accordion">
                                            <div class="card-body">
                                                {{ $faq->content }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h2>Ask your question</h2>
                            <form action="{{ route('contact.us.send.message') }}" method="post">
                                @honeypot
                                @csrf
                                <div class="form-group">
                                    <label for="name">Your name:</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">Email:</label>
                                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="subject">Subject:</label>
                                    <input type="text" value="{{ old('subject') }}" name="subject" id="subject" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="message">Your question:</label>
                                    <textarea rows="3" class="form-control" name="message" id="message"> {{ old('message') }}</textarea>
                                </div>
                                <button class="btn btn-outline-success">Send Message <i class="fa fa-check"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
@endsection
