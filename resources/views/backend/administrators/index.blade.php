@extends('backend.layout.default')
@section('title','Administrators')

@section('body')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Administrators</h3>
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

            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    @include('backend.includes.alert')
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Administrators<small>List</small></h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="clearfix"></div>
                            <div class="x_content">

                                <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="list-tab" data-toggle="tab" href="#list" role="tab" aria-controls="list" aria-selected="true">List</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="add-tab" data-toggle="tab" href="#add" role="tab" aria-controls="add" aria-selected="false">New Admin</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="list" role="tabpanel" aria-labelledby="list-tab">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card-box table-responsive">
                                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                        <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($administrators as $admin)
                                                            <tr>
                                                                <td>{{ $admin->name }}</td>
                                                                <td>{{ $admin->email }}</td>
                                                                <td>
                                                                    @if($admin->id !== 1)<a href="{{ route('backend.administrator.delete',['id' => $admin->id]) }}" class="float-right text-danger"><i class="fa fa-trash"></i> Delete</a>@endif
                                                                    <a href="#"><i class="fa fa-edit"></i> Edit</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="add" role="tabpanel" aria-labelledby="add-tab">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="clearfix mt-2"></div>
                                                <form class="form-label-left input_mask" action="{{ route('backend.administrator.create') }}" method="post">
                                                    @csrf
                                                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                                                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Name" name="name" required>
                                                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                                    </div>

                                                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                                                        <input type="email" class="form-control" id="inputSuccess3" placeholder="Email address" name="email" required>
                                                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                                    </div>

                                                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                                                        <input type="password" class="form-control has-feedback-left" id="inputSuccess4" name="password" placeholder="Password">
                                                        <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                                                    </div>

                                                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                                                        <input type="password" class="form-control" id="inputSuccess5" placeholder="Retype Password" name="password_confirmation" required>
                                                        <span class="fa fa-key form-control-feedback right" aria-hidden="true"></span>
                                                    </div>

                                                    <div class="ln_solid"></div>
                                                    <div class="form-group row">
                                                        <div class="col-md-9 col-sm-9  offset-md-3">
                                                            <button type="submit" class="btn btn-success float-right">Submit</button>
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
                </div>
            </div>
        </div>
    </div>

@endsection
