@extends('frontend.customer.help.layout')

@section('body')
    <!-- main section of the body here -->
    <section class="main-content-section">
        <div class="container">
            <div class="row">
                <div class="content-x">
                    <div class="content-x-panel">
                        <!-- first column here -->
                        <h3>{{ $page->title }}</h3>
                        <!-- end of first column -->
                        <div class="row">

                            <div class="col-md-12">
                               @if ($page->image)
                                    <img class="img-fluid" style="max-height: 500px; width: 100%;" src="{{ asset('uploads/pages/' . $page->image) }}">
                                @endif
                                {!! $page->content !!}
                            </div>
                            @if($page->video)
                                <div class="col-md-12">
                                    {!! $page->video !!}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
