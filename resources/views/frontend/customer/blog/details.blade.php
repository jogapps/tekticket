@extends('frontend.customer.others.layout')
@section('title', $blog->title)

@section('body')
    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

            <!-- Title -->
            <h1>{{ $blog->title }}</h1>
            <hr>

            <!-- Date/Time -->
            <p>Posted on {{ $blog->created_at->format('M jS, Y') }}</p>

            <hr>

            <!-- Preview Image -->
            <img class="img-fluid rounded" src="{{ asset('uploads/blog/' . $blog->getImage()) }}" alt="">

            <hr>

            <!-- Post Content -->
            {!! $blog->description_raw !!}
            <hr>
        </div>

        <!-- Sidebar Widgets Column -->
        @include('frontend.customer.blog.sidebar')

    </div>
@endsection
