@extends('backend.layout.default')
@section('title', 'FAQ')
@section('body')
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Faq</h3>
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
                        <h2>Faq List</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#list" role="tab" aria-controls="home" aria-selected="true">Faq List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#add" role="tab" aria-controls="profile" aria-selected="false">Add Faq</a>
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
                                                    <th>Question</th>
                                                    <th>Customer</th>
                                                    <th>Organizer</th>
                                                    <th>Answer</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse($faqs as $faq)
                                                    <tr>
                                                        <td>{{ $faq->title }}</td>
                                                        <td>{{ $faq->customer ? 'Yes' : 'No' }}</td>
                                                        <td>{{ $faq->organizer ? 'Yes' : 'No' }}</td>
                                                        <td>{{ $faq->content }}</td>
                                                        <td>
                                                            <a href="#editModal{{$faq->id}}" data-toggle="modal" class="btn btn-sm btn-info">Edit <i class="fa fa-arrow-right"></i></a>
                                                            <a href="{{ route('backend.faqs.delete',['faq' => $faq]) }}" class="btn btn-sm btn-outline-danger">Delete <i class="fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                    <div class="modal fade" id="editModal{{$faq->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <form action="{{ route('backend.faqs.update', ['faq' =>$faq]) }}" method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="myModalLabel">Edit Faq</h4>
                                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="item form-group">
                                                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Question <span class="required">*</span>
                                                                            </label>
                                                                            <div class="col-md-6 col-sm-6 ">
                                                                                <input type="text" id="title" name="title" required="required" class="form-control" value="{{ $faq->title }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="item form-group">
                                                                            <label class="col-form-label col-md-3 col-sm-3 label-align">Customer <span class="required">*</span>
                                                                            </label>
                                                                            <div class="col-md-6 col-sm-6">
                                                                                <input type="checkbox" @if($faq->customer) checked @endif name="customer" value="1">
                                                                            </div>
                                                                        </div>
                                                                        <div class="item form-group">
                                                                            <label class="col-form-label col-md-3 col-sm-3 label-align">Organizer <span class="required">*</span>
                                                                            </label>
                                                                            <div class="col-md-6 col-sm-6">
                                                                                <input type="checkbox" @if($faq->organizer) checked @endif name="organizer" value="1">
                                                                            </div>
                                                                        </div>
                                                                        <div class="item form-group">
                                                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="content">Answer <span class="required">*</span>
                                                                            </label>
                                                                            <div class="col-md-6 col-sm-6 ">
                                                                                <textarea class="form-control" name="content"> {{ $faq->content }} </textarea>
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
                                                @empty
                                                    <tr>
                                                        <td colspan="3">
                                                            <button class="btn btn-default btn-block btn-sm">No record found</button>
                                                        </td>
                                                    </tr>
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="add" role="tabpanel" aria-labelledby="profile-tab">
                                <form id="demo-form2" class="form-horizontal form-label-left" method="post" action="{{ route('backend.faqs.create') }}">
                                    @csrf
                                    <div class="item form-group row">
                                       <div class="col-md-6">
                                           <label for="title">Question <span class="required">*</span> </label>
                                           <input type="text" id="title" name="title" required="required" class="form-control" value="{{ old('title') }}">
                                       </div>
                                        <div class="col-md-6">
                                           <div class="row">
                                               <div class="col-md-6">
                                                   <label for="customer" class="col-md-12 mt-2">Customer</label>
                                                  <div class="checkbox">
                                                      <input type="checkbox" id="customer" name="customer" @if(old('customer'))  checked @endif class="flat" value="1">
                                                  </div>
                                               </div>
                                               <div class="col-md-6">
                                                   <label for="organizer" class="col-md-12 mt-2">Organizers</label>
                                                   <div class="checkbox">
                                                       <input type="checkbox" id="organizer" name="organizer" @if(old('organizer'))  checked @endif class="flat" value="1">
                                                   </div>
                                               </div>
                                           </div>
                                        </div>
                                    </div>
                                    <div class="item form-group row">
                                       <div class="col-md-12">
                                           <label for="content">Answer <span class="required">*</span></label>
                                           <textarea class="form-control" name="content">{{ old('content') }}</textarea>
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
