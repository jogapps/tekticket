@extends('backend.layout.default')
@section('title','Other Information')

@section('body')

    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Other Information</h3>
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
                            <h2>Update other information</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br>
                            <form action="{{ route('backend.other-information.update') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="email">Email Address * :</label>
                                        <input type="email" id="email" value="{{ $information->email }}" class="form-control" name="email" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="phone_1">Phone 1 * :</label>
                                        <input type="text" id="phone_1" class="form-control" value="{{ $information->phone_1 }}" name="phone_1" data-parsley-trigger="change" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="phone_2">Phone 2 :</label>
                                        <input type="text" id="phone_2" class="form-control" value="{{ $information->phone_2 }}" name="phone_2" data-parsley-trigger="change">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <label for="facebook">Facebook :</label>
                                        <input type="text" id="facebook" value="{{ $information->facebook }}" class="form-control" name="facebook">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="instagram">Instagram :</label>
                                        <input type="text" id="instagram" class="form-control" value="{{ $information->instagram }}" name="instagram" data-parsley-trigger="change">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="twitter">Twitter * :</label>
                                        <input type="text" id="twitter" class="form-control" value="{{ $information->twitter }}" name="twitter" data-parsley-trigger="change">
                                    </div>
                                </div><br/>
                                <button type="submit" class="btn btn-success">submit <i class="fa fa-arrow-right"></i></button>
                           </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
