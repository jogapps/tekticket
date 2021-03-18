@extends('backend.layout.default')
@section('title','Menus')
@push('page-script')
    <script>
        $("#menus").DataTable();
    </script>
@endpush
@section('body')

    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Menus & Category</h3>
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
        </div>

        <div class="row">
            @include('backend.includes.alert')
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Menu<small>List</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="clearfix"></div>
                        <div class="x_content">

                            <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="list-tab" data-toggle="tab" href="#customers" role="tab" aria-controls="list" aria-selected="true">Menus</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="customers" role="tabpanel" aria-labelledby="list-tab">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card-box table-responsive">
                                                <table id="menus" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Categories</th>
                                                        <th>Events</th>
                                                        <th>Status</th>
                                                        <th>Created On</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($menus as $menu)
                                                        <tr>
                                                            <td>{{ $menu->name }}</td>
                                                            <td>{{ $menu->categories()->count() }}</td>
                                                            <td>{{ $menu->events()->count() }}</td>
                                                            <td>{{ $menu->getStatus() }}</td>
                                                            <td>{{ $menu->created_at->format('M jS, Y') }}</td>
                                                            <td>
                                                                <a href="{{ route('backend.menu.details',$menu) }}">Details <i class="fa fa-arrow-right"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
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
    </div>

@endsection
