@extends('frontend.organizer.layout.default')
@section('title', 'Add Event')
@section('events-create-active', 'active')
@push('page-script')
    <script>
        $('.summernote').summernote({
            height: 300,
            tabsize: 2,
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['table', ['table']],
                ['recent', ['recent']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['link', ['link']]
                ['unordered', ['unordered']],
                ['fullscreen',['fullscreen']],
                ['ordered',['ordered']],
                ['codeview',['codeview']],
                ['help',['help']],
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
<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-edit bg-blue"></i>
                        <div class="d-inline">
                            <h5>Create Event</h5>
                            <span>Create a new event</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('organizer.dashboard') }}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Events</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create Events</li>
                        </ol>
                    </nav>
                </div>
            </div>
            @include('frontend.customer.includes.alert')
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3>Enter Event Details</h3></div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data" action="{{ route('organizer.events.create') }}">
                           @csrf
                            <div class="form-group row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="title" placeholder="Event Title" required>
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="category_id">Category</label>
                                    <select name="category_id" id="category_id" class="form-control" required>
                                        <option value="">Select category</option>
                                        @foreach($categories as $category)
                                            <option @if(old('category_id') === $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="event_date">Event date:</label>
                                    <input type="text" name="event_date" value="{{ old('event_date') }}" class="form-control" id="myDatepicker" placeholder="Event Title" required>
                                    @error('event_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="image">Event Image/Banner:</label>
                                    <input type="file" name="image"  class="form-control" id="image" placeholder="Image" required>
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12 col-sm-12">
                                    <label for="description_raw">Event description:</label>
                                    <textarea name="description_raw" class="summernote" required>{{ old('description_raw') }}</textarea>
                                    @error('description_raw')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <h5 class="mb-2 mt-5">Event Location</h5>
                            <div class="form-group row">
                                <div class="col-md-12 col-sm-12">
                                    <label for="street_1">Address Line 1</label>
                                    <input type="text" name="street_1" value="{{ old('street_1') }}" class="form-control" id="street_1" placeholder="Address line 1" required>
                                    @error('street_1')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="city">City: </label>
                                    <input type="text" name="city" value="{{ old('city') }}" class="form-control" id="city" placeholder="City" required>
                                    @error('city')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="state">State: </label>
                                    <input type="text" name="state" value="{{ old('state') }}" class="form-control" id="state" placeholder="state" required>
                                    @error('state')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <h5 class="mb-2 mt-5">Event Ticket</h5>
                            <div class="form-group row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="ticket_status">Ticket status: Note: <span class="text-danger">Ticket sale will close automatically after event date</span> </label>
                                    <select name="ticket_status" class="form-control" required>
                                        <option value="on sale">On Sale</option>
                                        <option value="closed">Closed</option>
                                    </select>
                                    @error('ticket_status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row border pb-5">
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

                            <div class="form-group row border pb-5">
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

                            <div class="form-group row border pb-5">
                                <div class="col-md-12">
                                    <h6 class="mb-2 mt-5">Vvip Ticket: (Optional)</h6>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <label for="vvip">Ticket name: </label>
                                    <input type="text" id="vvip" name="ticket_name[]" readonly value="Vvip" class="form-control">
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <label for="ticket_price">Ticket price: </label>
                                    <input type="number" name="ticket_price[]" class="form-control" id="ticket_price" value="{{ old('ticket_price') ? old('ticket_price')[2]:'' }}">
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <label for="ticket_available">Available Ticket(For sale): <span class="text-danger">Ticket sales will stop once it reaches the capacity</span> </label>
                                    <input type="number" name="ticket_available[]" placeholder="Leave blank for unlimited" class="form-control" id="ticket_available" value="{{ old('ticket_available') ? old('ticket_available')[2]:'' }}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
