@extends('backend.layout.default')
@section('title','Menu Details')
@push('page-script')
    <script>
        $("#categories").DataTable();
    </script>
@endpush
@section('body')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Menu</h3>
                </div>

                <div class="title_right text-right">
                    <div class="col-md-12 col-sm-12  form-group pull-right top_search">
                        <a href="{{ route('backend.menu.index') }}" class="btn btn-outline-info"><i class="fa fa-arrow-left"></i> Back To Menus </a>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>
            @include('backend.includes.alert')
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            @if ($menu->published)
                                <a href="{{ route('backend.menu.enable', $menu) }}" class="btn pull-right btn-sm btn-outline-danger">Disable <i class="fa fa-stop-circle"></i></a>
                            @else
                                <a href="{{ route('backend.menu.disable', $menu) }}" class="btn pull-right btn-sm btn-outline-success">Enable <i class="fa fa-check"></i></a>
                            @endif
                            <h2>Status: <strong>{{ $menu->getStatus() }}</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="col-md-3 col-sm-3  profile_left">
                                <h3>{{ $menu->name }}</h3>

                                <ul class="list-unstyled user_data">
                                    <li>
                                        Update Menu
                                    </li>
                                    <form action="{{ route('backend.menu.update', $menu) }}" method="post">
                                        @csrf
                                        <li>
                                            <input type="text" name="name" value="{{ $menu->name }}" class="form-control" required>
                                        </li>
                                        <li>
                                            <button type="submit" class="btn btn-outline-info btn-sm">Update Menu
                                                <i class="fa fa-arrow-right"></i></button>
                                        </li>
                                    </form>

                                </ul>
                            </div>
                            <div class="col-md-9 col-sm-9 ">
                                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Categories</a>
                                        </li>
                                    </ul>
                                    <div id="myTabContent" class="tab-content">
                                        <div role="tabpanel" class="tab-pane active show" id="tab_content1" aria-labelledby="home-tab">
                                            <!-- start profile details -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card-box table-responsive">
                                                        <table id="categories" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                            <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Events</th>
                                                                <th>Status</th>
                                                                <th>Created On</th>
                                                                <th class="text-center">Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($menu->categories as $category)
                                                                <tr>
                                                                    <td>{{ $category->name }}</td>
                                                                    <td>{{ $category->events()->count() }}</td>
                                                                    <td>{{ $category->getStatus() }}</td>
                                                                    <td>{{ $menu->created_at->format('M jS, Y') }}</td>
                                                                    <td>
                                                                        <a href="#editCategoryModal{{$category->id}}" data-toggle="modal">Edit <i class="fa fa-arrow-right"></i></a>
                                                                        @if ($category->published)
                                                                            <a href="{{ route('backend.menu.enable.category', $category) }}" class="btn pull-right btn-sm btn-outline-danger">Disable <i class="fa fa-stop-circle"></i></a>
                                                                        @else
                                                                            <a href="{{ route('backend.menu.disable.category', $category) }}" class="btn pull-right btn-sm btn-outline-success">Enable <i class="fa fa-check"></i></a>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                <div class="modal fade" id="editCategoryModal{{$category->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg">
                                                                        <div class="modal-content">
                                                                            <form action="{{ route('backend.menu.update.category', $category) }}" method="post" enctype="multipart/form-data">
                                                                                @csrf
                                                                                <div class="modal-header">
                                                                                    <h4 class="modal-title" id="myModalLabel">Edit Category</h4>
                                                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <div class="item form-group">
                                                                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Name <span class="required">*</span>
                                                                                        </label>
                                                                                        <div class="col-md-6 col-sm-6 ">
                                                                                            <input type="text" id="name" name="name" required="required" class="form-control" value="{{ $category->name }}">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="item form-group">
                                                                                        <label for="menu" class="col-form-label col-md-3 col-sm-3 label-align">Menu <span class="required">*</span>
                                                                                        </label>
                                                                                        <div class="col-md-6 col-sm-6">
                                                                                            <select name="menu" class="form-control" id="menu" required>
                                                                                                @foreach($menus as $menu)
                                                                                                    <option value="{{ $menu->id }}" @if($menu->id === $category->menu->id) selected @endif>{{ $menu->name }}</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                    <button type="submit" class="btn btn-success">Save changes <i class="fa fa-check"></i></button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end profile details -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection
