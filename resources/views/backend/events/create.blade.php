@extends('backend.layout.default')
@section('title','Create Event')
@push('page-script')
    <script>
        $(".summernote").summernote({
            height:350,
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
            showDropdowns: true,
            minYear:2019
        });
        $('#myDatepicker').val('{{old('event_date')}}');
        $('#myDatepicker').attr("placeholder","DD/MM/YYYY");

    </script>
@endpush
@section('body')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3><small>Create Event</small></h3>
                </div>
                <div class="title_right text-right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <a href="{{ route('backend.events.index') }}" class="btn btn-outline-info"><i class="fa fa-arrow-left"></i> Back To Events</a>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>
            @include('backend.includes.alert')
            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>{{ 'Title' }}</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form action="{{ route('backend.events.create') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="organizer_id">Organizer</label>
                                        <select id="organizer_id" name="organizer_id" class="form-control" required>
                                            <option value="">--Select Organizer--</option>
                                            @foreach($organizers as $organizer)
                                                <option @if(old('organizer_id') === $organizer->id) selected @endif value="{{ $organizer->id }}">{{ $organizer->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('organizer_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="title">Event Title</label>
                                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                                        @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="event_date">Event Date</label>
                                        <input type="text" name="event_date" value="{{ old('event_date') }}" class="form-control" id="myDatepicker" placeholder="Event Date" aria-describedby="inputSuccess2Status">
                                        @error('event_date')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="image">Image</label>
                                        <input type="file" name="image" id="image" class="form-control" value="{{ old('image') }}" required>
                                        @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="category_id">Category</label>
                                        <select id="category_id" name="category_id" class="form-control" required>
                                            <option value="">--Select Category--</option>
                                            @foreach($categories as $category)
                                                <option @if(old('category_id') === $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="status">Event Status</label>
                                        <select id="status" name="status" class="form-control" required>
                                            <option @if(old('status') === 'open') selected @endif value="open">Open</option>
                                            <option @if(old('status') === 'closed') selected @endif value="closed">Close</option>
                                        </select>
                                        @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="city">City</label>
                                        <input type="text" name="city" id="city" class="form-control" value="{{ old('city') }}" required>
                                        @error('city')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="state">State</label>
                                        <input type="text" name="state" id="state" class="form-control" value="{{ old('state') }}" required>
                                        @error('state')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="street_1">Address</label>
                                        <input type="text" name="street_1" id="street_1" class="form-control" value="{{ old('street_1') }}" required>
                                        @error('street_1')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="description_raw">Description</label>
                                        <textarea name="description_raw" id="description_raw" class="summernote" required>{{ old('description_raw') }}</textarea>
                                        @error('description_raw')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>Event Ticket</h4>
                                        <p>Ticket status: Note: <span class="text-danger">Ticket sale will close automatically after event date</span></p>
                                    </div>
                                    <div class="form-group col-md-12 pb-2 border">
                                        <div class="col-md-12">
                                            <h6 class="mb-2 mt-5">Regular Ticket</h6>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <label for="ticket_name">Ticket name: </label>
                                            <input type="text" name="ticket_name[]" readonly value="Regular" class="form-control">
                                            @error('ticket_name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <label for="price">Ticket price: </label>
                                            <input type="number" name="ticket_price[]" class="form-control" id="ticket_price" value="{{ old('ticket_price') ? old('ticket_price')[0]:'' }}">
                                            @error('ticket_price')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <label for="ticket_available">Available Ticket(For sale): <span class="text-danger">Ticket sales will stop once it reaches the capacity</span> </label>
                                            <input type="number" name="ticket_available[]" placeholder="Leave blank for unlimited" class="form-control" id="ticket_available" value="{{ old('ticket_available') ? old('ticket_available')[0]:'' }}">
                                            @error('ticket_available')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 pb-2 border">
                                        <div class="col-md-12">
                                            <h6 class="mb-2 mt-5">Vip Ticket (Optional)</h6>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <label for="ticket_name">Ticket name: </label>
                                            <input type="text" name="ticket_name[]" readonly value="Vip" class="form-control">
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <label for="ticket_price">Ticket price: </label>
                                            <input type="number" name="ticket_price[]" class="form-control" id="ticket_price" value="{{ old('ticket_price') ? old('ticket_price')[1]:''  }}">
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <label for="ticket_available">Available Ticket(For sale): <span class="text-danger">Ticket sales will stop once it reaches the capacity</span> </label>
                                            <input type="number" name="ticket_available[]" placeholder="Leave blank for unlimited" class="form-control" id="ticket_available" value="{{ old('ticket_available') ? old('ticket_available')[1]:'' }}">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 pb-2 border">
                                        <div class="col-md-12">
                                            <h6 class="mb-2 mt-5">Vvip Ticket: (Optional)</h6>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <label for="regular">Ticket name: </label>
                                            <input type="text" name="ticket_name[]" readonly value="Vvip" class="form-control">
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <label for="price">Ticket price: </label>
                                            <input type="number" name="ticket_price[]" class="form-control" id="ticket_price" value="{{ old('ticket_price') ? old('ticket_price')[2]:'' }}">
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <label for="ticket_available">Available Ticket(For sale): <span class="text-danger">Ticket sales will stop once it reaches the capacity</span> </label>
                                            <input type="number" name="ticket_available[]" placeholder="Leave blank for unlimited" class="form-control" id="ticket_available" value="{{ old('ticket_available') ? old('ticket_available')[2]:'' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-outline-success">Submit <i class="fa fa-check"></i></button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /page content -->
@endsection
