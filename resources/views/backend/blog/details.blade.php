@extends('backend.layout.default')
@section('title','Blog details')

@section('body')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Blog details</h3>
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
                            <h2>{{ $blog->title }}</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li>
                                    <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                                <div class="col-md-3 col-sm-3  profile_left  text-center">
                                    <div class="profile_img">
                                        <div id="crop-avatar">
                                            <!-- Current avatar -->
                                            <img class="img-fluid avatar-view" src="{{ asset('uploads/blog/' . $blog->image ) }}" alt="Blog Image">
                                        </div>
                                    </div>
                                    <br/>
                                    <a class="btn btn-info" href="{{ route('backend.blog.update',['blog' => $blog]) }}">Edit Blog <i class="fa fa-edit"></i></a>
                                    <br>

                                    <div class="">'
                                        <h4>Video</h4>
                                        <iframe width="250" src="https://www.youtube.com/embed/{{ $blog->video }}"
                                                frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope;
                                                picture-in-picture" allowfullscreen></iframe>
                                    </div>

                                </div>
                                <div class="col-md-9 col-sm-9 ">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3 class="name_title">Blog Content</h3>
                                                <div class="divider"></div>
                                                {!! $blog->description_raw !!}
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
