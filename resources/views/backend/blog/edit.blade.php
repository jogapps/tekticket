@extends('backend.layout.default')
@section('title','Edit blog')
@push('page-script')
    <script>
        $('.summernote').summernote({
            // placeholder: 'Hello Bootstrap 4',
            tabsize: 2,
            height: 400,
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['h1','h2', 'h3', 'h4', 'h5', 'h6', 'bold', 'italic', 'underline', 'clear']],
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
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Edit blog</h3>
                </div>
                <div class="title_right text-right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <a href="#" class="btn btn-outline-info"><i class="fa fa-arrow-left"></i> Back To Blog</a>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    @include('backend.includes.alert')
                    <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" action="{{ route('backend.blog.update', ['blog' => $blog]) }}">
                        @csrf
                        <div class="item form-group row">
                            <label class="text-left col-form-label col-md-2 col-sm-2 label-align" for="title">Title
                                <span class="text-danger required">*</span>
                            </label>
                            <div class="col-md-10 col-sm-10">
                                <input type="text" id="title" name="title" value="{{ $blog->title }}" required class="form-control">
                            </div>
                        </div>
                        <div class="item form-group row">
                            <label class="text-left col-form-label col-md-2 col-sm-2 label-align" for="image">
                                Image<span class="text-danger required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="file" id="image" name="image" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <img src="{{ asset('uploads/blog/' . $blog->getImage()) }}" width="250" class="img-fluid"/>
                            </div>
                        </div>
                        <div class="item form-group row">
                            <label class="text-left col-form-label col-md-2 col-sm-2 label-align" for="caption">
                                Video (optional)
                            </label>
                            <div class="col-md-10 col-sm-10">
                                <input type="text" id="video" name="video" value="{{ $blog->video }}" class="form-control">
                            </div>
                        </div>
                        <div class="item form-group row">
                            <label class="text-left col-form-label col-md-2 col-sm-2 label-align" for="p_content">
                                Content <span class="text-danger required">*</span>
                            </label>
                            <div class="col-md-10 col-sm-10">
                                <textarea class="summernote" name="description_raw"> {{ $blog->description_raw }} </textarea>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <button type="submit" class="btn btn-success">Submit <i class="fa fa-check"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
