<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Details</title>
    <link rel="stylesheet" href="{{ asset('assets/frontend/customer/assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/customer/assets/css/ticketsales-styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/customer/assets/css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/customer/assets/css/fontawesome5/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/customer/assets/css/style.css') }}">
    <style>
        .container-fluid {
            padding-right: 0;
            padding-left: 0;
            margin-right: auto;
            margin-left: auto;
        }

        .dropdown-menu {
            margin: 0px;
            padding: 0px;
        }

        .dropdown-item {
            padding-top: 0;
        }
        body{
            background:#f5f5f5;
            }
        /*------- portfolio -------*/
        .project {
            margin: 15px 0;
        }

        .no-gutter .project {
            margin: 0 !important;
            padding: 0 !important;
        }

        .has-spacer {
            margin-left: 30px;
            margin-right: 30px;
            margin-bottom: 30px;
        }

        .has-spacer-extra-space {
            margin-left: 30px;
            margin-right: 30px;
            margin-bottom: 30px;
        }

        .has-side-spacer {
            margin-left: 30px;
            margin-right: 30px;
        }

        .project-title {
            font-size: 1.25rem;
        }

        .project-skill {
            font-size: 0.9rem;
            font-weight: 400;
            letter-spacing: 0.06rem;
        }

        .project-info-box {
            margin: 15px 0;
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 5px;
        }

        .project-info-box p {
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #d5dadb;
        }

        .project-info-box p:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }
        img {
            width: 100%;
            max-width: 100%;
            height: auto;
            -webkit-backface-visibility: hidden;
        }
        .rounded {
            border-radius: 5px !important;
        }
        .btn-xs.btn-icon {
            width: 34px;
            height: 34px;
            max-width: 34px !important;
            max-height: 34px !important;
            font-size: 10px;
            line-height: 34px;
        }
        /* facebook button */
        .btn-facebook, .btn-facebook:active, .btn-facebook:focus {
            color: #fff !important;
            background: #4e68a1;
            border: 2px solid #4e68a1;
        }

        .btn-facebook:hover {
            color: #fff !important;
            background: #3b4f7a;
            border: 2px solid #3b4f7a;
        }

        .btn-facebook-link, .btn-facebook-link:active, .btn-facebook-link:focus {
            color: #4e68a1 !important;
            background: transparent;
            border: none;
        }

        .btn-facebook-link:hover {
            color: #3b4f7a !important;
        }

        .btn-outline-facebook, .btn-outline-facebook:active, .btn-outline-facebook:focus {
            color: #4e68a1 !important;
            background: transparent;
            border: 2px solid #4e68a1;
        }

        .btn-outline-facebook:hover {
            color: #fff !important;
            background: #4e68a1;
            border: 2px solid #4e68a1;
        }

        /* twitter button */
        .btn-twitter, .btn-twitter:active, .btn-twitter:focus {
            color: #fff !important;
            background: #65b5f2;
            border: 2px solid #65b5f2;
        }

        .btn-twitter:hover {
            color: #fff !important;
            background: #5294c6;
            border: 2px solid #5294c6;
        }

        .btn-twitter:hover {
            color: #fff !important;
            background: #5294c6;
            border: 2px solid #5294c6;
        }

        .btn-twitter-link, .btn-twitter-link:active, .btn-twitter-link:focus {
            color: #65b5f2 !important;
            background: transparent;
            border: none;
        }

        .btn-twitter-link:hover {
            color: #5294c6 !important;
        }

        .btn-outline-twitter, .btn-outline-twitter:active, .btn-outline-twitter:focus {
            color: #65b5f2 !important;
            background: transparent;
            border: 2px solid #65b5f2;
        }

        .btn-outline-twitter:hover {
            color: #fff !important;
            background: #65b5f2;
            border: 2px solid #65b5f2;
        }

        /* google button */
        .btn-google, .btn-google:active, .btn-google:focus {
            color: #fff !important;
            background: #e05d4b;
            border: 2px solid #e05d4b;
        }

        .btn-google:hover {
            color: #fff !important;
            background: #b94c3d;
            border: 2px solid #b94c3d;
        }

        .btn-google-link, .btn-google-link:active, .btn-google-link:focus {
            color: #e05d4b !important;
            background: transparent;
            border: none;
        }

        .btn-google-link:hover {
            color: #b94c3d !important;
        }

        .btn-outline-google, .btn-outline-google:active, .btn-outline-google:focus {
            color: #e05d4b !important;
            background: transparent;
            border: 2px solid #e05d4b;
        }

        .btn-outline-google:hover {
            color: #fff !important;
            background: #e05d4b;
            border: 2px solid #e05d4b;
        }

        /* linkedin button */
        .btn-linkedin, .btn-linkedin:active, .btn-linkedin:focus {
            color: #fff !important;
            background: #2083bc;
            border: 2px solid #2083bc;
        }

        .btn-linkedin:hover {
            color: #fff !important;
            background: #186592;
            border: 2px solid #186592;
        }

        .btn-linkedin-link, .btn-linkedin-link:active, .btn-linkedin-link:focus {
            color: #2083bc !important;
            background: transparent;
            border: none;
        }

        .btn-linkedin-link:hover {
            color: #186592 !important;
        }

        .btn-outline-linkedin, .btn-outline-linkedin:active, .btn-outline-linkedin:focus {
            color: #2083bc !important;
            background: transparent;
            border: 2px solid #2083bc;
        }

        .btn-outline-linkedin:hover {
            color: #fff !important;
            background: #2083bc;
            border: 2px solid #2083bc;
        }

        /* pinterest button */
        .btn-pinterest, .btn-pinterest:active, .btn-pinterest:focus {
            color: #fff !important;
            background: #d2373b;
            border: 2px solid #d2373b;
        }

        .btn-pinterest:hover {
            color: #fff !important;
            background: #ad2c2f;
            border: 2px solid #ad2c2f;
        }

        .btn-pinterest-link, .btn-pinterest-link:active, .btn-pinterest-link:focus {
            color: #d2373b !important;
            background: transparent;
            border: none;
        }

        .btn-pinterest-link:hover {
            color: #ad2c2f !important;
        }

        .btn-outline-pinterest, .btn-outline-pinterest:active, .btn-outline-pinterest:focus {
            color: #d2373b !important;
            background: transparent;
            border: 2px solid #d2373b;
        }

        .btn-outline-pinterest:hover {
            color: #fff !important;
            background: #d2373b;
            border: 2px solid #d2373b;
        }

        /* dribble button */
        .btn-dribbble, .btn-dribbble:active, .btn-dribbble:focus {
            color: #fff !important;
            background: #ec5f94;
            border: 2px solid #ec5f94;
        }

        .btn-dribbble:hover {
            color: #fff !important;
            background: #b4446e;
            border: 2px solid #b4446e;
        }

        .btn-dribbble-link, .btn-dribbble-link:active, .btn-dribbble-link:focus {
            color: #ec5f94 !important;
            background: transparent;
            border: none;
        }

        .btn-dribbble-link:hover {
            color: #b4446e !important;
        }

        .btn-outline-dribbble, .btn-outline-dribbble:active, .btn-outline-dribbble:focus {
            color: #ec5f94 !important;
            background: transparent;
            border: 2px solid #ec5f94;
        }

        .btn-outline-dribbble:hover {
            color: #fff !important;
            background: #ec5f94;
            border: 2px solid #ec5f94;
        }

        /* instagram button */
        .btn-instagram, .btn-instagram:active, .btn-instagram:focus {
            color: #fff !important;
            background: #4c5fd7;
            border: 2px solid #4c5fd7;
        }

        .btn-instagram:hover {
            color: #fff !important;
            background: #4252ba;
            border: 2px solid #4252ba;
        }

        .btn-instagram-link, .btn-instagram-link:active, .btn-instagram-link:focus {
            color: #4c5fd7 !important;
            background: transparent;
            border: none;
        }

        .btn-instagram-link:hover {
            color: #4252ba !important;
        }

        .btn-outline-instagram, .btn-outline-instagram:active, .btn-outline-instagram:focus {
            color: #4c5fd7 !important;
            background: transparent;
            border: 2px solid #4c5fd7;
        }

        .btn-outline-instagram:hover {
            color: #fff !important;
            background: #4c5fd7;
            border: 2px solid #4c5fd7;
        }

        /* youtube button */
        .btn-youtube, .btn-youtube:active, .btn-youtube:focus {
            color: #fff !important;
            background: #e52d27;
            border: 2px solid #e52d27;
        }

        .btn-youtube:hover {
            color: #fff !important;
            background: #b31217;
            border: 2px solid #b31217;
        }

        .btn-youtube-link, .btn-youtube-link:active, .btn-youtube-link:focus {
            color: #e52d27 !important;
            background: transparent;
            border: none;
        }

        .btn-youtube-link:hover {
            color: #b31217 !important;
        }

        .btn-outline-youtube, .btn-outline-youtube:active, .btn-outline-youtube:focus {
            color: #e52d27 !important;
            background: transparent;
            border: 2px solid #e52d27;
        }

        .btn-outline-youtube:hover {
            color: #fff !important;
            background: #e52d27;
            border: 2px solid #e52d27;
        }
        .btn-xs.btn-icon span, .btn-xs.btn-icon i {
            line-height: 34px;
        }
        .btn-icon.btn-circle span, .btn-icon.btn-circle i {
            margin-top: -1px;
            margin-right: -1px;
        }
        .btn-icon i {
            margin-top: -1px;
        }
        .btn-icon span, .btn-icon i {
            display: block;
            line-height: 50px;
        }
        a.btn, a.btn-social {
            display: inline-block;
        }
        .mr-5 {
            margin-right: 5px !important;
        }
        .mb-0 {
            margin-bottom: 0 !important;
        }
        .btn-facebook, .btn-facebook:active, .btn-facebook:focus {
            color: #fff !important;
            background: #4e68a1;
            border: 2px solid #4e68a1;
        }
        .btn-circle {
            border-radius: 50% !important;
        }
        .project-info-box p {
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #d5dadb;
        }
        p {
            font-family: "Barlow", sans-serif !important;
            font-weight: 300;
            font-size: 1rem;
            color: #686c6d;
            letter-spacing: 0.03rem;
            margin-bottom: 10px;
        }
        b, strong {
            font-weight: 700 !important;
        }
    </style>
    <script type='text/javascript'
            src='https://platform-api.sharethis.com/js/sharethis.js#property=5eff9d861bbdc90012dbcd9b&product=inline-share-buttons&cms=sop'
            async='async'>
    </script>
</head>

<body>
@include('frontend.customer.includes.header')
<!-- header section ends -->
    <!-- main page content -->
    <main class=" pl-10" id="main-content large-screen-padding">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item">Events</li>
                <li class="breadcrumb-item active" aria-current="page">{{ $event->category->menu->name }}</li>
                <li class="breadcrumb-item active" aria-current="page">{{ $event->category->name }}</li>
            </ol>
        </nav>
        <div class="container-fluid" style="margin: 0 15px;">
            <div class="row">
                <div class="col-12 col-lg-7 col-xl-8">
                    @include('frontend.customer.includes.alert')

                    <div class="row">
                        <div class="col-md-5">
                            <div class="project-info-box mt-0">
                                <h5>{{ $event->title }}</h5>
                                {!! Str::limit($event->description_raw,219) !!}
                            </div><!-- / project-info-box -->

                            <div class="project-info-box">
                                <p><b>Event Status:</b> <strong>{{ $event->getStatus() }}</strong></p>
                                <p><b>Ticket Status:</b> <strong>{{ Str::title($event->ticket_status) }}</strong></p>
                                <p><b>Event Date:</b> {{ $event->event_date->format('M jS, Y') }}</p>
                                <p><b>Location:</b> {{ $event->street_1 }}</p>
                                <p><b>City:</b>  {{ $event->city }}, {{ $event->state }}</p>
                                <p><b>Category:</b> {{ $event->category->name }}</p>
                            </div><!-- / project-info-box -->

                        </div><!-- / column -->
                        <div class="col-md-7">
                            <img src="{{ $event->image }}" alt="project-image" class="rounded">
                            <div class="project-info-box">
                                <p><b>Location:</b> {{ $event->getLocation() }}</p>
                                <p><b>Category:</b> {{ $event->category->name }}</p>
                            </div><!-- / project-info-box -->
                            <div class="project-info-box mt-0 mb-0">
                                <span class="fw-bold mr-10 va-middle hide-mobile">Share:</span>
                                <div class="sharethis-inline-share-buttons"></div>
                            </div><!-- / project-info-box -->
                        </div><!-- / column -->
                    </div>
                </div>
                <div class="col-12 col-lg-5 col-xl-4" id="seat-calculator">
                    <!-- first row starts here -->
                    <div class="row mx-auto">
                        <div class="col-12 tickets-selection">
                            <form class="" action="">
                                <div class="form-row mb-2">
                                    <div class="col-10 col-sm-10 col-lg-10">
                                        <button type="button" class="btn btn-block btn-outline-info">Available Tickets <i class="fa fa-ticket-alt"></i></button>
                                    </div>
                                </div>
                                <!-- <hr> -->
                            </form>

                        </div>
                    </div>
                    <!-- first row ends here -->

                    <!-- second row starts here -->
                    <div class="row">
                        <div class="col-11">
                            @if ($event->isClosed())
                                <button type="button" class="btn btn-warning btn-block">This Event is Closed <i class="fa fa-calendar-times"></i></button>
                            @endif
                            <!-- nav tabs -->
                            <ul class="nav text-center price-and-seat" role="tablist">
                                <li class="nav-item">
                                    <a href="#prices" id="price-link" class="nav-link active tab-links" data-toggle="tab">Purchase Ticket</a>
                                </li>
                            </ul>

                            <!-- tab contents -->
                            <div class="row tab-content">
                                <div class="col-11 tab-pane active" id="prices">
                                    <table class="row table table-hover">
                                        <tbody class="col-12">
                                        @foreach($event->prices as $price)
                                            <tr class="row  table-head border-top">
                                                <th class="">
                                                    <div class="row">
                                                        <span class="col-1 col-lg-2 circle-star">
                                                            <i class="fas fa-arrow-right"></i>
                                                        </span>
                                                        <span class="col-10 col-lg-9 vip-package"> {{ $price->getTitle() }}
                                                           &#8358;{{ number_format($price->amount,2) }}
                                                        </span>
                                                        </span>
                                                    </div>
                                                </th>
                                                <th class="">
                                                    <a class="btn btn-info @if($event->ticket_status === CLOSED || !$price->isOnSale()) disabled @endif"
                                                       @if($event->ticket_status === ON_SALE || $price->isOnSale())
                                                        href="{{ route('event.checkout', ['event' => $event, 'eventPrice' => $price]) }}"
                                                       @else
                                                       href="javascript:void(0);"
                                                       @endif
                                                    >
                                                        Buy Ticket <i class="fa fa-ticket-alt"></i></a>
                                                </th>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-12 tab-pane" id="seats">
                                    <table class="row table table-hover">
                                        <thead class="col-12">
                                        <tr class="row table-head">
                                            <td class="">
                                                <div class="row">
                                                        <span class="col-1 circle-star">
                                                            <i class="fas fa-star"></i>
                                                        </span>
                                                    <span class="col-10 vip-package">VIP Packages <br>
                                                            <span class="money-range">$299.00-$499.00</span>
                                                        </span>
                                                </div>
                                            </td>
                                            <td class="">
                                                <a href="#href">More Info</a>
                                            </td>
                                        </tr>
                                        </thead>
                                        <tbody class="col-12">
                                        <tr class="row table-content">
                                            <td class="">
                                                <div class="row">
                                                    <div class="col-12 packages">
                                                        <span class="number-rows">Sec FL1, Row 1</span> <br>
                                                        <span class="admission">Verified Resale Ticket</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class=""> <a href="#" class="seat-price">$1,900.01 ea</a> </td>
                                        </tr>
                                        <tr class="row table-content">
                                            <td class="">
                                                <div class="row">
                                                    <div class="col-12 packages">
                                                        <span class="number-rows">Sec FL1, Row 2</span> <br>
                                                        <span class="admission">Verified Resale Ticket</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class=""> <a href="#" class="seat-price">$1,100.00 ea</a> </td>
                                        </tr>
                                        <tr class="row table-content">
                                            <td class="">
                                                <div class="row">
                                                    <div class="col-12 packages">
                                                        <span class="number-rows">Sec FL1, Row 2</span> <br>
                                                        <span class="admission">Official Platinum</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class=""> <a href="#" class="seat-price">$980.00 ea</a> </td>
                                        </tr>
                                        <tr class="row table-content">
                                            <td class="">
                                                <div class="row">
                                                    <div class="col-12 packages">
                                                        <span class="number-rows">Sec FL1, Row 2</span> <br>
                                                        <span class="admission">Verified Resale Ticket</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class=""> <a href="#" class="seat-price">$955.01 ea</a> </td>
                                        </tr>
                                        <tr class="row table-content">
                                            <td class="">
                                                <div class="row">
                                                    <div class="col-12 packages">
                                                        <span class="number-rows">Sec FL1, Row 3</span> <br>
                                                        <span class="admission">Official Platinum</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class=""> <a href="#" class="seat-price">$830.00 ea</a> </td>
                                        </tr>
                                        <tr class="row table-content">
                                            <td class="">
                                                <div class="row">
                                                    <div class="col-12 packages">
                                                        <span class="number-rows">Sec FL1, Row 3</span> <br>
                                                        <span class="admission">Verified Resale Ticket</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class=""> <a href="#" class="seat-price">$840.00 ea</a> </td>
                                        </tr>
                                        <tr class="row table-content">
                                            <td class="">
                                                <div class="row">
                                                    <div class="col-12 packages">
                                                        <span class="number-rows">Sec FL3, Row 2</span> <br>
                                                        <span class="admission">Verified Resale Ticket</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class=""> <a href="#" class="seat-price">$995.00 ea</a> </td>
                                        </tr>
                                        <tr class="row table-content">
                                            <td class="">
                                                <div class="row">
                                                    <div class="col-12 packages">
                                                        <span class="number-rows">Sec FL3, Row 2</span> <br>
                                                        <span class="admission">Verified Resale Ticket</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class=""> <a href="#" class="seat-price">$995.00 ea</a> </td>
                                        </tr>
                                        <tr class="row table-content">
                                            <td class="">
                                                <div class="row">
                                                    <div class="col-12 packages">
                                                        <span class="number-rows">Sec FL3, Row 2</span> <br>
                                                        <span class="admission">Verified Resale Ticket</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class=""> <a href="#" class="seat-price">$995.00 ea</a> </td>
                                        </tr>
                                        <tr class="row table-content">
                                            <td class="">
                                                <div class="row">
                                                    <div class="col-12 packages">
                                                        <span class="number-rows">Sec FL3, Row 2</span> <br>
                                                        <span class="admission">Verified Resale Ticket</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class=""> <a href="#" class="seat-price">$995.00 ea</a> </td>
                                        </tr>
                                        <tr class="row table-content">
                                            <td class="">
                                                <div class="row">
                                                    <div class="col-12 packages">
                                                        <span class="number-rows">Sec FL3, Row 2</span> <br>
                                                        <span class="admission">Verified Resale Ticket</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class=""> <a href="#" class="seat-price">$995.00 ea</a> </td>
                                        </tr>
                                        <tr class="row table-content">
                                            <td class="">
                                                <div class="row">
                                                    <div class="col-12 packages">
                                                        <span class="number-rows">Sec FL3, Row 2</span> <br>
                                                        <span class="admission">Verified Resale Ticket</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class=""> <a href="#" class="seat-price">$995.00 ea</a> </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>
    </main>

<div class="container-fluid">
   @include('frontend.customer.includes.footer')
</div>

<script src="{{ asset('assets/frontend/customer/assets/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/frontend/customer/assets/js/custom.js') }}"></script>
<script src="{{ asset('assets/frontend/customer/assets/js/bootstrapjs/bootstrap.min.js') }}"></script>
</body>
</html>
