@extends('backend.layout.default')
@section('title','Edit Events')
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
        $('#myDatepicker').daterangepicker({
            singleDatePicker: true,
            singleClasses: "picker_1"
        }, function (start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
        });
    </script>
@endpush
@section('body')
    <div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Events</h3>
            </div>
            <div class="title_right text-right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <a href="{{ route('backend.events.details', $event) }}" class="btn btn-outline-info"><i class="fa fa-arrow-left"></i> Back To Event Details</a>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit Event</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <form class="form-horizontal form-label-left" enctype="multipart/form-data" action="{{ route('backend.events.edit', $event) }}" method="post">
                          @csrf
                            <div class="item form-group row">
                               <div class="col-md-6 col-sm-12">
                                   <label class="col-form-label col-md-3 col-sm-3" for="title">Title <span class="required">*</span>
                                   </label>
                                   <div class="col-md-9 col-sm-9">
                                       <input type="text" id="title" value="{{ $event->title }}" name="title" required="required" class="form-control">
                                       @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                       @enderror
                                   </div>
                               </div>
                                <div class="col-md-6 col-sm-12">
                                    <label class="col-form-label col-md-3 col-sm-3" for="category_id">Category <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9">
                                        <select name="category_id" id="category_id" class="form-control" required>
                                            <option value="">Select category</option>
                                            @foreach($categories as $category)
                                                <option @if($event->category_id === $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="item form-group row">
                                <div class="col-md-6 col-sm-12">
                                    <label class="col-form-label col-md-3 col-sm-3" for="event_date">Event Date <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9">
                                        <div class="control-group">
                                            <div class="controls">
                                                <div class="xdisplay_inputx form-group row has-feedback">
                                                    <input type="text" disabled class="form-control has-feedback-left" id="myDatepicker" placeholder="Event Date" aria-describedby="inputSuccess2Status">
                                                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                    <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                                    @error('event_date')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label class="col-form-label col-md-3 col-sm-3" for="street_1">Address <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9">
                                        <input type="text" id="street_1" value="{{ $event->street_1 }}" name="street_1" required="required" class="form-control">
                                        @error('street_1')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <div class="item form-group row">
                                <div class="col-md-6 col-sm-12">
                                    <label class="col-form-label col-md-3 col-sm-3" for="city">City <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9">
                                        <input type="text" id="city" value="{{ $event->city }}" name="city" required="required" class="form-control">
                                        @error('city')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label class="col-form-label col-md-3 col-sm-3" for="state">State <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9">
                                        <input type="text" id="state" value="{{ $event->state }}" name="state" required="required" class="form-control">
                                        @error('state')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="item form-group row">
                                <div class="col-md-6 col-sm-12">
                                    <label class="col-form-label col-md-3 col-sm-3" for="image">Event Image
                                    </label>
                                    <div class="col-md-9 col-sm-9">
                                        <input type="file" id="image" name="image" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 offset-md-2 col-sm-12">
                                    <img src="{{ asset('uploads/events/' . $event->image) }}" width="200" class="img-fluid"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label class="col-form-label" for="description_raw">Event description: <span class="required">*</span>
                                    </label>
                                    <textarea name="description_raw" id="description_raw" class="summernote" required>{{ $event->description_raw }}</textarea>
                                    @error('description_raw')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-12 text-right col-sm-6">
                                    <button type="submit" class="btn btn-success">Submit <i class="fa fa-check"></i> </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
