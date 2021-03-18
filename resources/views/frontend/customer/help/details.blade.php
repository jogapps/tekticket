@extends('frontend.customer.help.layout')

@section('body')
    <!-- main section of the body here -->
    <section class="main-content-section">
        <div class="container">
            <div class="row">
                <div class="content-x">
                    <div class="content-x-panel text-center">
                        <!-- first column here -->
                        <h3>{{ $help->name }}</h3>
                        <!-- end of first column -->
                        <div class="row">

                            <div class="col-md-12">
                                {!! $help->content !!}
                            </div>
                            @if($help->video)
                                <div class="col-md-12">
                                    {!! $help->video !!}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
