@extends('backend.layout.default')
@section('title','Organizers Profile')
@push('page-script')
    <script>
        $("#event-table").DataTable()
    </script>
@endpush
@section('body')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Organizer Profile</h3>
                </div>

                <div class="title_right text-right">
                    <div class="col-md-12 col-sm-12  form-group pull-right top_search">
                        <a href="#" class="btn btn-outline-info"><i class="fa fa-arrow-left"></i> Back To Organizers </a>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>
            @include('backend.includes.alert')
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Profile Status: <strong><span class="text-success">ACTIVE</span></strong></h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="col-md-3 col-sm-3  profile_left">
                                <div class="profile_img">
                                    <div id="crop-avatar">
                                        <!-- Current avatar -->
                                        <img class="img-responsive img-fluid avatar-view" src="{{ asset('uploads/organizers/' . $organizer->getImage()) }}" alt="Avatar" title="Change the avatar">
                                    </div>
                                </div>
                                <h3>{{ $organizer->getName() }}</h3>

                                <ul class="list-unstyled user_data">
                                    <li><i class="fa fa-user user-profile-icon"></i>
                                        About Organizer
                                    </li>
                                    <li>
                                        {!! $organizer->description ?? 'Not Provided' !!}
                                    </li>

                                </ul>
                            </div>
                            <div class="col-md-9 col-sm-9 ">
                                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Profile Details</a>
                                        </li>
                                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Edit Profile</a>
                                        </li>
                                    </ul>
                                    <div id="myTabContent" class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade" id="tab_content1" aria-labelledby="home-tab">
                                            <!-- start profile details -->
                                              <div class="row">
                                                  <div class="col-md-6">
                                                      <ul class="messages">
                                                          <li>
                                                              <div class="message_wrapper">
                                                                  <h4 class="heading">Organization Name</h4>
                                                                  <blockquote class="message" style="font-size: 15px;">{{ $organizer->name }}</blockquote>
                                                              </div>
                                                          </li>
                                                      </ul>

                                                  </div>
                                                  <div class="col-md-6">
                                                      <ul class="messages">
                                                          <li>
                                                              <div class="message_wrapper">
                                                                  <h4 class="heading">Email</h4>
                                                                  <blockquote class="message" style="font-size: 15px;">{{ $organizer->email }}</blockquote>
                                                              </div>
                                                          </li>
                                                      </ul>
                                                  </div>
                                                  <div class="col-md-6">
                                                      <ul class="messages">
                                                          <li>
                                                              <div class="message_wrapper">
                                                                  <h4 class="heading">Phone Number</h4>
                                                                  <blockquote class="message" style="font-size: 15px;">{{ $organizer->phone ?? 'Not Provided' }}</blockquote>
                                                              </div>
                                                          </li>
                                                      </ul>

                                                  </div>
                                                  <div class="col-md-6">
                                                      <ul class="messages">
                                                          <li>
                                                              <div class="message_wrapper">
                                                                  <h4 class="heading">Country</h4>
                                                                  <blockquote class="message" style="font-size: 15px;">{{ $organizer->country ?? 'Not Provided' }}</blockquote>
                                                              </div>
                                                          </li>
                                                      </ul>
                                                  </div>
                                                  <div class="col-md-6">
                                                      <ul class="messages">
                                                          <li>
                                                              <div class="message_wrapper">
                                                                  <h4 class="heading">State</h4>
                                                                  <blockquote class="message" style="font-size: 15px;">{{ $organizer->state ?? 'Not Provided' }}</blockquote>
                                                              </div>
                                                          </li>
                                                      </ul>
                                                  </div>
                                                  <div class="col-md-6">
                                                      <ul class="messages">
                                                          <li>
                                                              <div class="message_wrapper">
                                                                  <h4 class="heading">City</h4>
                                                                  <blockquote class="message" style="font-size: 15px;">{{ $organizer->city ?? 'Not Provided' }}</blockquote>
                                                              </div>
                                                          </li>
                                                      </ul>
                                                  </div>
                                                  <div class="col-md-6">
                                                      <ul class="messages">
                                                          <li>
                                                              <div class="message_wrapper">
                                                                  <h4 class="heading">Address</h4>
                                                                  <blockquote class="message" style="font-size: 15px;">{{ $organizer->address ?? 'Not Provided' }}</blockquote>
                                                              </div>
                                                          </li>
                                                      </ul>
                                                  </div>
                                                  <div class="col-md-6">
                                                      <ul class="messages">
                                                          <li>
                                                              <div class="message_wrapper">
                                                                  <h4 class="heading">Email Verified</h4>
                                                                  <blockquote class="message" style="font-size: 15px;">{{ $organizer->email_verified_at ? 'Yes' : 'No' }}</blockquote>
                                                              </div>
                                                          </li>
                                                      </ul>
                                                  </div>
                                                  <div class="col-md-6">
                                                      <ul class="messages">
                                                          <li>
                                                              <div class="message_wrapper">
                                                                  <h4 class="heading">Facebook</h4>
                                                                  <blockquote class="message" style="font-size: 15px;">{{ $organizer->facebook ?? 'Not Provided' }}</blockquote>
                                                              </div>
                                                          </li>
                                                      </ul>
                                                  </div>
                                                  <div class="col-md-6">
                                                      <ul class="messages">
                                                          <li>
                                                              <div class="message_wrapper">
                                                                  <h4 class="heading">Twitter</h4>
                                                                  <blockquote class="message" style="font-size: 15px;">{{ $organizer->twitter ?? 'Not Provided' }}</blockquote>
                                                              </div>
                                                          </li>
                                                      </ul>
                                                  </div>
                                                  <div class="col-md-6">
                                                      <ul class="messages">
                                                          <li>
                                                              <div class="message_wrapper">
                                                                  <h4 class="heading">Instagram</h4>
                                                                  <blockquote class="message" style="font-size: 15px;">{{ $organizer->instagram ?? 'Not Provided' }}</blockquote>
                                                              </div>
                                                          </li>
                                                      </ul>
                                                  </div>
                                              </div>
                                            <!-- end profile details -->
                                        </div>
                                        <div role="tabpanel" class="tab-pane active" id="tab_content2" aria-labelledby="profile-tab">
                                            <form action="{{ route('backend.organizers.update', $organizer) }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <label for="name" class="">Name</label>
                                                        <input type="text" id="name" name="name" class="form-control" value="{{ $organizer->name }}" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="email" class="">Email</label>
                                                        <input type="email" id="email" class="form-control" value="{{ $organizer->email }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <label for="phone" class="">Phone Number</label>
                                                        <input type="text" name="phone" id="phone" class="form-control" value="{{ $organizer->phone }}" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="country" class="">Country</label>
                                                        <input type="text" name="country" id="country" class="form-control" value="{{ $organizer->country }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <label for="state" class="">State</label>
                                                        <input type="text" name="state" id="state" class="form-control" value="{{ $organizer->state }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="city" class="">City</label>
                                                        <input type="text" name="city" id="city" class="form-control" value="{{ $organizer->city }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <label for="address" class="">Address</label>
                                                        <input type="text" name="address" id="address" class="form-control" value="{{ $organizer->address }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <label for="image" class="">Profile Image</label>
                                                        <input type="file" name="image" id="image" class="form-control" >
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="facebook" class="">Facebook</label>
                                                        <input type="text" name="facebook" id="facebook" class="form-control" value="{{ $organizer->facebook }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <label for="twitter" class="">Twitter</label>
                                                        <input type="text" name="twitter" id="twitter" class="form-control" >
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="instagram" class="">Instagram</label>
                                                        <input type="text" name="instagram" id="instagram" class="form-control" value="{{ $organizer->instagram }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <label for="description" class="">About Organizer</label>
                                                        <textarea rows="3" id="description" name="description" class="form-control">{{ $organizer->description }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-info">Submit <i class="fa fa-check"></i></button>
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
            <div class="row">
                <div class="x_panel">
                        <div class="col-md-4"><h5>Total Event(s): {{ $organizer->events()->count() }}</h5></div>
                        <div class="col-md-4"><h5>Closed Event(s): {{ $organizer->events()->closed()->count() }} </h5></div>
                        <div class="col-md-4"><h5>Open Event(s): {{ $organizer->events()->open()->count() }}</h5></div>
                    <div class="x_content">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="event-table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Event Date</th>
                                        <th>Location</th>
                                        <th>Event Status</th>
                                        <th>Ticket Status</th>
                                        <th>Ticket Sold</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($organizer->events as $event)
                                        <tr>
                                            <td>{{ $event->title }}</td>
                                            <td>{{ $event->event_date->format('M jS, Y') }}</td>
                                            <td>{{ $event->getLocation() }}</td>
                                            <td>{{ $event->status }}</td>
                                            <td>{{ $event->ticket_status }}</td>
                                            <td>{{ $event->soldTickets()->count() }}</td>
                                            <td>
                                                <a href="{{ route('backend.events.details',$event) }}">Details <i class="fa fa-arrow-right"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">
                                                <button class="btn btn-default btn-block">No Event</button>
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection
