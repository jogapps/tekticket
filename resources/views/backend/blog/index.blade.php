@extends('backend.layout.default')
@section('title', 'Blog')
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
        $("#blog-table").DataTable();
    </script>
@endpush
@section('body')
    <div  class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Blog</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                      <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>

        @include('backend.includes.alert')
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Blog</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#list" role="tab" aria-controls="home" aria-selected="true">Blog List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#add" role="tab" aria-controls="profile" aria-selected="false">Add Blog</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="list" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card-box table-responsive">
                                            <table id="blog-table" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th>SN</th>
                                                    <th>Title</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse($posts as $blog)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $blog->title }}</td>
                                                        <td>{{ $blog->created_at->format('M jS, Y    ') }}</td>
                                                        <td>
                                                            <a href="{{ route('backend.blog.details', ['blog' => $blog]) }}" class="btn btn-sm btn-info">Details <i class="fa fa-arrow-right"></i></a>
                                                            <a href="{{ route('backend.blog.delete', ['blog' => $blog]) }}" class="btn pull-right btn-sm btn-danger">Delete <i class="fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="4">
                                                            <button type="button" class="btn btn-default btn-block">No record found</button>
                                                        </td>
                                                    </tr>
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="add" role="tabpanel" aria-labelledby="home-tab">
                                <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" action="{{ route('backend.blog.create') }}">
                                    @csrf
                                    <div class="item form-group row">
                                        <label class="text-left col-form-label col-md-2 col-sm-2 label-align" for="title">Title
                                            <span class="text-danger required">*</span>
                                        </label>
                                        <div class="col-md-10 col-sm-10">
                                            <input type="text" id="title" name="title" value="{{ old('title') }}" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="item form-group row">
                                        <label class="text-left col-form-label col-md-2 col-sm-2 label-align" for="image">
                                            Image<span class="text-danger required">*</span>
                                        </label>
                                        <div class="col-md-10 col-sm-10">
                                            <input type="file" id="image" name="image" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="item form-group row">
                                        <label class="text-left col-form-label col-md-2 col-sm-2 label-align" for="caption">
                                            Video (optional)
                                        </label>
                                        <div class="col-md-10 col-sm-10">
                                            <input type="text" id="video" name="video" value="{{ old('video') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="item form-group row">
                                        <label class="text-left col-form-label col-md-2 col-sm-2 label-align" for="p_content">
                                            Content <span class="text-danger required">*</span>
                                        </label>
                                        <div class="col-md-10 col-sm-10">
                                            <textarea class="summernote" name="description_raw"> {{ old('description_raw') }} </textarea>
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
            </div>
        </div>
    </div>
@endsection
