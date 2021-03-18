<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Checkout | TekTicket</title>
    <link rel="stylesheet" href="{{ asset('assets/frontend/customer/assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/customer/assets/css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/customer/assets/css/fontawesome5/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/customer/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/customer/assets/css/checkout.css') }}">

    <style>
        .container-fluid {
            padding-right: 0;
            padding-left: 0;
            margin-right: auto;
            margin-left: auto;
        }

        .dropdown-menu{
            margin: 0px;
            padding: 0px;
        }

        .dropdown-item{
            padding-top: 0;
        }
    </style>
</head>

<body>

@include('frontend.customer.includes.header')
<!-- end of header section -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item" aria-current="page">{{ $event->title }}</li>
        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
    </ol>
</nav>
<main class="large-screen-padding">
    <div class="container-fluid account-overview">
        <h5 class="h4 font-w d-md-none">Purchase Ticket</h5>
        <h5 class="h4 font-w ">Purchase Ticket</h5>

    </div>
    <!--For Page-->
    <div class="bg">
        <!--For Row containing all card-->
        @include('frontend.customer.includes.alert')
        <div class="alert" style="display: none;">
        </div>
        <div class="row mainRow">
            <!--Card 1-->
            <div class="col-sm-8">
                <div class="card card-cascade wider shadow p-3 mb-5 ">
                    <!--Card image-->
                    <div class="view view-cascade overlay text-center"> <img class="card-img-top" src="{{ $event->image }}" alt=""> <a>
                            <div class="mask rgba-white-slight"></div>
                        </a> </div>
                    <!--Product Description-->
                    <div class="desc">
                        <!-- 1st Row for title-->
                        <div class="row subRow">
                            <!--Column for Data-->
                            <div class="col">
                                <p class="text-muted row1">Event Title</p>
                                <p class="row2">{{ $event->title }}</p>
                            </div>
                            <!--Column for Data-->
                            <div class="col">
                                <p class="text-muted row1">Event Date</p>
                                <p class="row2">{{ $event->event_date->format('M jS, Y') }}</p>
                            </div>
                            <!--Column for Data-->
                            <div class="col">
                                <p class="text-muted row1">Ticket Status</p>
                                <p class="row2">{{ $eventPrice->is_on_sale ? 'On Sale' : 'Closed' }}</p>
                            </div>
                        </div> <!-- 2nd Row for title-->
                        <div class="row subRow">
                            <!--Column for Data-->
                            <div class="col">
                                <p class="text-muted row1">Location</p>
                                <p class="row2">{{ $event->getLocation() }}</p>
                            </div>
                            <div class="col">
                                <p class="text-muted row1">Event Status</p>
                                <p class="row2">{{ $event->getStatus() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Card 2-->
            <div class="col-sm-4">
                <div class="card card-cascade card-ecommerce wider shadow p-3 mb-5 ">
                    <!--Card Body-->
                    <form action="{{ route('event.validate.ticket.purchase',['event' => $event, 'eventPrice' => $eventPrice]) }}" method="post" class="validate-ticket-purchase">
                        @csrf
                        <div class="card-body card-body-cascade">
                            <!--Card Description-->
                            <div class="card2decs">
                                <p class="heading1"><strong>{{ $eventPrice->getTitle() }}</strong></p>
                                <ul class="list-group">
                                    <li class="list-group-item border-bottom-0 border-right-0 border-left-0">
                                        <div class="row justify-content-between">
                                            <div class="col-md-3">QTY</div>
                                            <div class="col-md-4">
                                                <input type="number" min="1" class="form-control ticket_quantity" name="quantity" value="1">
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item border-bottom-0 border-right-0 border-left-0">
                                        <div class="row justify-content-between">
                                            <div class="col-md-6">Unit Cost</div>
                                            <div class="col-md-6 text-right">
                                                &#8358;<span class="unit_cost">{{ number_format($eventPrice->amount,2) }}</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item border-bottom-0 border-right-0 border-left-0">
                                        <div class="row justify-content-between">
                                            <div class="col-md-6">Total Cost</div>
                                            <div class="col-md-6 text-right">
                                                &#8358;<span class="total_cost">{{ number_format($eventPrice->amount,2) }}</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                {{--
                                <div class="divider"></div>
                                <p class="shipping">Gift Voucher<span class="float-right text1">Free</span></p>
                                <p class="promocode">Promo Code<span class="float-right text1">&#8358; 100</span></p>
                                <p class="total"><strong>Total</strong><span class="float-right totalText1">$<span class="totalText2">1,140</span></span></p>--}}
                            </div>
                            <div class="payment">
                                <p class="heading2"><strong>Wallet details</strong></p>
                                <p class="cardAndExpire">Wallet<span class="float-right">Expiry</span></p>
                                <p class="cardAndExpireValue">&#8358;{{ number_format(auth()->user()->wallet->balance,2) }}<span class="float-right">26/11</span></p>
                                <p class="nameAndcvc" style="margin-bottom:-10px;">Gift Voucher</p>
                                <p class="nameAndcvcValue">&#8358;{{ number_format(auth()->user()->giftVoucher->balance,2) }}</p>
                            </div>
                            <!--Card footer--> <button type="submit" class="btn-block purchaseLink">
                                <div class="card-footer text-center"> PURCHASE &#8594; </div>
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <form method="post" id="process-ticket-purchase" action="{{ route('process.ticket.payment') }}" class="form-horizontal" role="form">
            @csrf
            <input type="hidden" name="email" value="{{ auth()->user()->email }}"> {{-- required --}}
            <input type="hidden" name="amount" value=""> {{-- required in kobo --}}
            <input type="hidden" name="quantity" value="1">
            <input type="hidden" name="currency" value="NGN">
            <input type="hidden" name="metadata" value="{{ json_encode($array = ['action' => 'ticket_purchase', 'event_price' => $eventPrice->id]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
    </form>
</main>

<div class="container-fluid">
    @include('frontend.customer.includes.footer')
</div>

<script src="{{ asset('assets/frontend/customer/assets/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/frontend/customer/assets/js/bootstrapjs/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/frontend/customer/assets/js/custom.js') }}"></script>
</body>

</html>
