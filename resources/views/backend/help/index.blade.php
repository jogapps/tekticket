@extends('backend.layout.default')
@section('title', 'Help')
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
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Pages</h3>
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
                        <h2>Pages</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#list" role="tab" aria-controls="home" aria-selected="true">Pages List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#add" role="tab" aria-controls="profile" aria-selected="false">Add Page</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="list" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card-box table-responsive">
                                            <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse($helps as $help)
                                                    <tr>
                                                        <td>{{ $help->name }}</td>
                                                        <td>
                                                            <a href="{{ route('backend.help.update', ['help' => $help]) }}" class="btn btn-sm btn-info">Details <i class="fa fa-arrow-right"></i></a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="5">No record found</td>
                                                    </tr>
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="add" role="tabpanel" aria-labelledby="home-tab">
                                <form id="demo-form2" class="form-horizontal form-label-left" method="post" action="{{ route('backend.pages.create') }}">
                                    @csrf
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-2 col-sm-2 label-align" for="title">Title <span class="required">*</span>
                                        </label>
                                        <div class="col-md-10 col-sm-10">
                                            <input type="text" id="title" name="title" required="required" class="form-control" value="{{ old('title') }}">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-2 col-sm-2 label-align" for="title">Top Question <span class="required">*</span>
                                        </label>
                                        <div class="col-md-4 col-sm-4">
                                            <select name="top_question" class="form-control" required>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                        <label class="col-form-label col-md-2 col-sm-2 label-align" for="title">General <span class="required">*</span>
                                        </label>
                                        <div class="col-md-4 col-sm-4">
                                            <select name="general" class="form-control" required>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-2 col-sm-2 label-align" for="title">Image (optional)
                                        </label>
                                        <div class="col-md-4 col-sm-4">
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                        <label class="col-form-label col-md-2 col-sm-2 label-align" for="title">Video (Optional)
                                        </label>
                                        <div class="col-md-4 col-sm-4">
                                            <input type="text" name="video" class="form-control">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-2 col-sm-2 label-align" for="content">Content <span class="required">*</span>
                                        </label>
                                        <div class="col-md-10 col-sm-10">
                                            <textarea class="summernote" name="content"> {{ old('content') }} </textarea>
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
        </div>
    </div>
@endsection
