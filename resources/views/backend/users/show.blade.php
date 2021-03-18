@extends('backend.layout.default')
@section('title','User Profile')

@section('body')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Users</h3>
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
                                        <img class="img-responsive avatar-view" src="{{ asset('uploads/users/' . $user->getImage()) }}" alt="Avatar" title="Change the avatar">
                                    </div>
                                </div>
                                <h3>{{ $user->name }}</h3>

                                <ul class="list-unstyled user_data">
                                    <li><i class="fa fa-envelope-o user-profile-icon"></i> {{ $user->email }}
                                    </li>

                                    <li>
                                        <i class="fa fa-briefcase user-profile-icon"></i> customer Engineer
                                    </li>

                                    {{--<li class="m-top-xs">
                                        <i class="fa fa-external-link user-profile-icon"></i>
                                        <a href="http://www.kimlabs.com/profile/" target="_blank">www.kimlabs.com</a>
                                    </li>--}}
                                </ul>

                                {{--<a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>--}}
                                <br>

                                <!-- start skills -->
                                <h4>Skills</h4>
                                <ul class="list-unstyled user_data">
                                    <li>
                                        <p>Web Applications</p>
                                        <div class="progress progress_sm">
                                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50" aria-valuenow="49" style="width: 50%;"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <p>Website Design</p>
                                        <div class="progress progress_sm">
                                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70" aria-valuenow="69" style="width: 70%;"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <p>Automation &amp; Testing</p>
                                        <div class="progress progress_sm">
                                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="30" aria-valuenow="29" style="width: 30%;"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <p>UI / UX</p>
                                        <div class="progress progress_sm">
                                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50" aria-valuenow="49" style="width: 50%;"></div>
                                        </div>
                                    </li>
                                </ul>
                                <!-- end of skills -->

                            </div>
                            <div class="col-md-9 col-sm-9 ">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-4 widget widget_tally_box">
                                            <div class="x_panel fixed_height_390">
                                                <div class="x_content">
                                                    <div style="text-align: center; margin-bottom: 17px">
                                                        <i class="fa fa-ticket fa-5x"></i>
                                                    </div>
                                                    <h3 class="name_title">Ticket</h3>
                                                    <p>Ticket Stats</p>
                                                    <div class="divider"></div>
                                                    <div class="">
                                                        <ul class="list-inline widget_tally">
                                                            <li class="p-0 py-2">
                                                                <p>
                                                                    <span class="text-left month">Active Ticket(s) &#8358;{{ number_format($user->wallet->balance,2) }}</span>
                                                                    <span class="count">3</span>
                                                                </p>
                                                            </li>
                                                            <li class="p-0 py-2">
                                                                <p>
                                                                    <span class="text-left month">Used Ticket(s) &#8358;{{ number_format($user->wallet->balance,2) }}</span>
                                                                    <span class="count">20</span>
                                                                </p>
                                                            </li>
                                                            <li class="p-0 py-2">
                                                                <p>
                                                                    <span class="text-left month">Unused Ticket(s) &#8358;{{ number_format($user->wallet->balance,2) }}</span>
                                                                    <span class="count">0</span>
                                                                </p>
                                                            </li>
                                                            <li class="p-0 pt-2">
                                                                <p>
                                                                    <span class="text-left month">Total Ticket(s) &#8358;{{ number_format($user->wallet->balance,2) }}</span>
                                                                    <span class="count">0</span>
                                                                </p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="flex">
                                                        <ul class="list-inline count2 flex-column border-0">
                                                            <li class="w-100">
                                                                <h3 class="text-center">&#8358;{{ number_format(15000,2) }}</h3>
                                                                <span>Total Value</span><br/>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 widget widget_tally_box">
                                            <div class="x_panel ui-ribbon-container fixed_height_390">
                                                <div class="ui-ribbon-wrapper">
                                                    <div class="ui-ribbon">
                                                        @if ($user->wallet->valid_until)
                                                            {{ $user->wallet->valid_until->diffInDays(now()) }} Day(s)
                                                        @else
                                                            0 Day
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="x_content">
                                                    <div style="text-align: center; margin-bottom: 17px">
                                                        <i class="fa fa-credit-card fa-5x"></i>
                                                    </div>
                                                    <h3 class="name_title">Wallet</h3>
                                                    <p>Wallet Stats</p>
                                                    <div class="flex">
                                                        <ul class="list-inline count2 flex-column">
                                                            <li class="w-100">
                                                                <h3 class="text-center">&#8358;{{ number_format($user->wallet->balance,2) }}</h3>
                                                                <p >Current Balance</p>
                                                                <p>Valid Until:{{ $user->wallet->getFormattedValidUntilDate() }}</p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="flex">
                                                        <ul class="list-inline count2 flex-column border-0">
                                                            <li class="w-100">
                                                                <h3 class="text-center">&#8358;{{ number_format($user->wallet->balance,2) }}</h3>
                                                                <span>Balance History</span><br/>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 widget widget_tally_box">
                                            <div class="x_panel fixed_height_390">
                                                <div class="x_content">
                                                    <div style="text-align: center; margin-bottom: 17px">
                                                        <i class="fa fa-gift fa-5x"></i>
                                                    </div>
                                                    <h3 class="name_title">Voucher</h3>
                                                    <p>Voucher Stats</p>
                                                    <div class="flex">
                                                        <ul class="list-inline count2 flex-column">
                                                            <li class="w-100">
                                                                <h3 class="text-center">&#8358;{{ number_format($user->wallet->balance,2) }}</h3>
                                                                <p >Current Balance</p>
                                                                <p>Valid Until:{{ $user->wallet->valid_until }}</p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="flex">
                                                        <ul class="list-inline count2 flex-column border-0">
                                                            <li class="w-100">
                                                                <h3 class="text-center">&#8358;{{ number_format($user->wallet->balance,2) }}</h3>
                                                                <span>Balance History</span><br/>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3 class="name_title">User summary</h3>
                                            <div class="divider"></div>
                                            <p>
                                                <strong>{{ $user->name }}</strong> became a member on
                                                <strong>{{ $user->created_at->format('F jS, Y') }}({{$user->created_at->diffForHumans()}})</strong>.
                                                This user have <strong>attended {{ 5 }} event(s), missed {{ 0 }} event(s)</strong>
                                                and has <strong>{{ 6 }} upcoming event(s)</strong>. {{ $user->name }} have bought in total of
                                                <strong>
                                                    {{25}} ticket(s) worth of &#8358;{{ number_format(500000,2) }}, Active {{ 3 }} ticket(s),
                                                    {{ 20 }} used ticket(s) and {{ 2 }} unsed ticket(s)
                                                </strong>

                                            </p>
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
