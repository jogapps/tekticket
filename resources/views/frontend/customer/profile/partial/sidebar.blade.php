<div class="col-lg-3 col-md-4">
    <div class="card-divs mt-4">

        <!-- For viewport less than medium (768px) -->
        <div class="d-md-none mb-3">
            <div class="row px-3">
                <div class="col-sm-9 col-6 pl-">
                    <h2 class="h5 font-w  pt-3">{{ auth()->user()->name }}</h2>
                    <small class=" pt-3 small-color">Member since {{ auth()->user()->created_at->format('M, Y') }}</small>
                </div>
                <div class="col-sm-3 col-6 text-right my-3">
                    <a href="{{ route('profile.edit') }}" class="rounded btn btn-outline-info btn-sm">
                        Edit Profile <i class="fa fa-user-edit"></i>
                    </a>
                </div>
            </div>
            <div class="dropdown-divider"></div>
            <div class="row px-3">
                <div class="col-9">
                    <small class="grey-theme">Email Address</small><br>
                    <p>{{ auth()->user()->email }}</p>
                </div>
            </div>
            <div class="dropdown-divider"></div>
            <div class="row px-3">
                <div class="col-sm-8 col-5">
                    <small class="grey-theme">Phone Number</small><br>
                    <p>{{ auth()->user()->phone ?? 'Not provided' }} <br>
                </div>
            </div>
        </div>
        <!-- For viewport less than medium (768px) ends -->

        <!-- For viewport larger than medium (768px)-->
        <div class="d-none d-md-block">
            <div class="text-center">
                <h2 class="h2 font-w  pt-3">{{ auth()->user()->name }}</h2>
                <div class="">
                    <img src="{{ auth()->user()->profile_image }}" alt="" class="profile-img img-fluid center-block">
                </div>
                <small class=" pt-3 small-color">Member since {{ auth()->user()->created_at->format('M, Y') }}</small><br>
                <a href="{{ route('profile.edit') }}" class="rounded btn btn-outline-info btn-sm">
                    Edit Profile <i class="fa fa-user-edit"></i>
                </a>
            </div>
            <div class="dropdown-divider"></div>
            <div class="text-left pl-4 py-1">
                <small class="grey-theme">Email Address</small><br>
                <p>{{ auth()->user()->email }}<br>
                </p>
            </div>
            <div class="dropdown-divider"></div>
            <div class="text-left pl-4 py-1">
                <small class="grey-theme">Phone Number</small><br>
                <p>{{ auth()->user()->phone ?? 'Not provided' }} <br>
                </p>
            </div>
        </div>
        <!-- For viewport larger than medium (768px) ends -->

    </div>
    <div class="card-divs mt-4 d-md-block">
        <p class="color-theme pl-4 pt-3"><a href="{{ route('profile.index') }}"> <i class="fa fa-user"></i> My Profile</a></p>
        <div class="dropdown-divider"></div>
        <p class="color-theme pl-4 pt-3"><a href="{{ route('ticket.index') }}"><i class="fa fa-server"></i> My Tickets</a></p>
        <div class="dropdown-divider"></div>
        <p class="color-theme pl-4"><a href="{{ route('profile.edit') }}"><i class="fa fa-user-edit"></i> Edit Profile</a></p>
        <div class="dropdown-divider"></div>
        <p class="color-theme pl-4"><a href="{{ route('profile.voucher.log') }}"><i class="fa fa-wallet"></i> Gift Voucher Log</a></p>
        <div class="dropdown-divider"></div>
    </div>
    <div class="card-divs mt-4 p-4 d-none d-md-block">
        <h5 class="h5 pb-3">We're here to help</h5>
        <p>For any enquiry, You can send us an email at support@tekticket.com</p>
        <p>Send us a message <a href="{{ route('contact.us') }}">Click Here</a> </p>
        <p>Call Us <i class="fa fa-phone"></i> :  <a href="#"> {{ $information->phone_1 }}</a> </p>
    </div>
</div>
