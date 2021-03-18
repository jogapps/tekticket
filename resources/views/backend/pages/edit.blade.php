@extends('backend.layout.default')
@section('title', 'Update Page')
@push('page-script')
    <script>
        $('.summernote').summernote({
            // placeholder: 'Hello Bootstrap 4',
            tabsize: 2,
            height: 400
        });
    </script>
@endpush
@section('body')
    <div  class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Page</h3>
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
                        <h2>Update page</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form id="demo-form2" class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="{{ route('backend.pages.update', ['page' => $page]) }}">
                            @csrf
                            <div class="item form-group">
                                <label class="col-form-label col-md-2 col-sm-2 label-align" for="title">Title <span class="required">*</span>
                                </label>
                                <div class="col-md-10 col-sm-10">
                                    <input type="text" id="title" name="title" required="required" class="form-control" value="{{ $page->title }}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-2 col-sm-2 label-align" for="title">Top Question <span class="required">*</span>
                                </label>
                                <div class="col-md-4 col-sm-4">
                                    <select name="top_question" class="form-control" required>
                                        <option @if($page->top_question) selected @endif value="1">Yes</option>
                                        <option @if(!$page->top_question) selected @endif value="0">No</option>
                                    </select>
                                </div>
                                <label class="col-form-label col-md-2 col-sm-2 label-align" for="title">General <span class="required">*</span>
                                </label>
                                <div class="col-md-4 col-sm-4">
                                    <select name="general" class="form-control" required>
                                        <option  @if($page->general) selected @endif value="1">Yes</option>
                                        <option  @if(!$page->general) selected @endif value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-2 col-sm-2 label-align" for="image">Image (optional)
                                </label>
                                <div class="col-md-4 col-sm-4">
                                    <input type="file" name="image" id="image" class="form-control">
                                </div>
                                <label class="col-form-label col-md-2 col-sm-2 label-align" for="video">Video (Optional)
                                </label>
                                <div class="col-md-4 col-sm-4">
                                    <input type="text" name="video" id="video" value="{{ $page->video }}" class="form-control">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-2 col-sm-2 label-align" for="content">Content <span class="required">*</span>
                                </label>
                                <div class="col-md-10 col-sm-10">
                                    <textarea class="summernote" name="content"> {{ $page->content }} </textarea>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button type="submit" class="btn btn-success">Update <i class="fa fa-check"></i></button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
