@extends('frontend.customer.help.layout')

@section('body')
<!-- main section of the body here -->
<section class="main-content-section">
    <div class="container-fluid">
        <div class="row">
            <div class="content-x">
                <div class="content-x-panel">
                    <!-- first column here -->
                    <h5>Fan Safety Is Our Priority: For Your Event’s Refund or Credit Eligibility Visit Your Account or Learn More About Options for Canceled, Rescheduled and Postponed Events</h5>
                    <!-- end of first column -->
                    <div class="row">
                        <div class="col-md-6">
                            <div style="color:#fff; font-size:2.6em; text-align: center; line-height: 250px; width: 95%; height:246px; background:url('{{ asset('assets/frontend/customer/assets/images/whats_new.png') }}'); background-repeat: no-repeat; background-size: cover;">
                                See What's New
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5 style="font-weight: 400; color: #000;">Top Questions</h5>
                            <ul class="list-group">
                                @foreach ($topQuestionsPages as $page)
                                    <li class="list-group-item"><a href="{{ route('page', ['keyword' => $page->slug]) }}">{{ $page->title }}</a> </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row d-flex justify-content-around">
            <div class="col-md-12">
                <h5 class="text-center">Browse Popular Topics</h5>
            </div>
            @foreach($helps as $help)
                <div class="col-md-2 text-center">
                    <a href="{{ route('help.details', $help) }}" class="">
                        <img class="img-fluid" width="120" src="{{ asset('uploads/helps/' . $help->image) }}">
                        <p style="font-size:14px;">{{ $help->name }}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
