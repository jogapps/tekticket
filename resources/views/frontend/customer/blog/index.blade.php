@extends('frontend.customer.others.layout')
@section('title', 'Blog')

@section('body')
    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            @forelse($posts as $blog)
                <div class="card mb-4">
                <img class="card-img-top" src="{{ asset('uploads/blog/' . $blog->getImage()) }}" alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title">{{ $blog->title }}</h2>
                    <p class="card-text">{{ Str::limit($blog->description,300) }}</p>
                    <a href="{{ route('blog.details', ['slug' => $blog->slug]) }}" class="btn btn-primary">Read More →</a>
                </div>
                <div class="card-footer text-muted">
                    Posted on {{ $blog->created_at->format('M jS, Y') }} by
                    <a href="#">Admin</a>
                </div>
            </div>
            @empty
                <h2>No Blog Post</h2>
            @endforelse
            <!-- Pagination -->
            {{--{{ $posts->links() }}--}}
        </div>

        <!-- Sidebar Widgets Column -->
        @include('frontend.customer.blog.sidebar')

    </div>
@endsection
