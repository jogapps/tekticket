@extends('frontend.customer.profile.layout.default')
@section('title', 'Profile')
@section('body')
<div class="container-fluid account-overview my-5">
    <h1 class="h1 font-w d-none d-md-block">Account Overview</h1>
    <h4 class="h4 font-w d-md-none">Account Overview</h4>
    @include('frontend.customer.includes.alert')
    <div class="row">
        @include('frontend.customer.profile.partial.sidebar')
        <div class="col-lg-9 col-md-8 px-">
            <h5 class="my-4">Quick Tips</h5>
            <div class="row">
                <div class="col-xl-4 col-md-12">
                    <div class="row">
                        <div class="col-3 col-sm-2 col-md-2 col-lg-3">
                            <i class="color-theme fa fa-wallet fa-3x"></i>
                        </div>
                        <div class="col-9 col-sm-10 col-md-10 col-lg-9">
                            <h6>Wallet <br/>
                                &#8358; {{ number_format(auth()->user()->balance,2) }}
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-12">
                    <div class="row">
                        <div class="col-3 col-sm-2 col-md-2 col-lg-3">
                            <i class="color-theme fa fa-id-card fa-3x"></i>
                        </div>
                        <div class="col-9 col-sm-10 col-md-10 col-lg-9">
                            <h6>Gift Voucher <br/>
                                &#8358; {{ number_format(auth()->user()->giftVoucher->balance,2) }}
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-12">
                    <div class="row">
                        <div class="col-3 col-sm-2 col-md-2 col-lg-3">
                            <i class="color-theme fa fa-id-card fa-3x"></i>
                        </div>
                        <div class="col-9 col-sm-10 col-md-10 col-lg-9">
                            <h6>My Tickets</h6>
                            <a href="{{ route('ticket.index') }}" >
                                My Tickets <i class="fa fa-arrow-right"></i></a>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-12">
                    <h4>Wallet & Gift Voucher</h4>
                </div>
            </div>
            <div class="card-divs mt-4 p-4">
                <div class="row">
                    <div class="col-xl-12 col-md-12">
                       <div class="row">
                           <div class="col-md-6">
                               <div class="card px-4 py-2">
                                   <div class="div1 row py-2 px-2">
                                       <div class="col-7 mt-2">
                                           <p class="font-weight-bold mb-5 darkWhite" id="heading">Wallet</p>
                                           <h4 class="mt-3">&#8358;{{ number_format(auth()->user()->wallet->balance,2) }}</h4>
                                       </div>
                                       <div class="col-5 d-flex align-items-center">
                                           <div class="rounded-circle d-flex align-items-center justify-content-center w-100" id="circl">
                                               <i class="fa fa-wallet fa-5x"></i>
                                               {{--<img src="https://i.imgur.com/XToGJBL.png" height="90%" width="90%" alt=""> --}}
                                           </div>
                                       </div>
                                   </div>
                                   <div class="py-2">
                                       <p id="desc">Value of unused ticket is transferred to your wallet after event date. <a href="#">Learn More!</a> </p>
                                       <div class="d-flex">
                                           <h6 class=" align-self-center"> <a href="#"> Valid until <span class="rounded-circle sp1 px-2 py-0 ml-1">
                                                       <i class="fa fa-angle-right" aria-hidden="true"></i> </span> </a>
                                           </h6>
                                           <button class="btn d-flex ml-auto px-3 font-weight-bold darkWhite"> {{ auth()->user()->wallet->valid_until }} </button>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="col-md-6">
                               <div class="card px-4 py-2">
                                   <div class="div1 row py-2 px-2">
                                       <div class="col-7 mt-2">
                                           <p class="font-weight-bold mb-5 darkWhite" id="heading">Gift Voucher</p>
                                           <h4 class="mt-3">&#8358;{{ number_format(auth()->user()->giftVoucher->balance,2) }}</h4>
                                       </div>
                                       <div class="col-5 d-flex align-items-center">
                                           <div class="rounded-circle d-flex align-items-center justify-content-center w-100" id="circl">
                                               <i class="fa fa-gifts fa-5x"></i>
                                               {{--<img src="https://i.imgur.com/XToGJBL.png" height="90%" width="90%" alt=""> --}}
                                           </div>
                                       </div>
                                   </div>
                                   <div class="py-2">
                                       <p id="desc">Send and Receive Gift Voucher for user that can be use to Purchase event ticket <a href="#">Learn More!</a> </p>
                                       <div class="d-flex">
                                           <h6 class=" align-self-center"> <a href="#"> Send Gift Voucher <span class="rounded-circle sp1 px-2 py-0 ml-1">
                                                       <i class="fa fa-angle-right" aria-hidden="true"></i> </span> </a>
                                           </h6>
                                           <button data-toggle="modal" data-target="#buyVoucherModal" class="btn d-flex ml-auto px-3 font-weight-bold darkWhite"> Buy Voucher </button>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="modal fade" id="buyVoucherModal" tabindex="-1" role="dialog" aria-hidden="true">
                               <div class="modal-dialog">
                                   <form action="{{ route('gift.voucher.validate.purchase') }}" method="post" class="validate-gift-voucher-purchase">
                                       <div class="modal-content">
                                           <div class="modal-header">
                                               <h5 class="modal-title">Send Gift Voucher</h5>
                                               <button type="button" class="close" data-dismiss="modal">&times;</button>
                                           </div>
                                           <div class="modal-body">
                                               <div class="alert" style="display: none;"></div>
                                               <div class="form-group">
                                                   <label class="label-align" for="email">User Email Address</label>
                                                   <input type="email" name="email" id="email" required class="form-control">
                                               </div>
                                               <div class="form-group">
                                                   <label class="label-align" for="amount">Amount</label>
                                                   <input type="number" name="amount" id="amount" required class="form-control">
                                               </div>
                                           </div>
                                           <div class="modal-footer">
                                               <button type="submit" class="btn btn-outline-info">Proceed <i class="fa fa-arrow-circle-right"></i></button>
                                           </div>
                                       </div>
                                   </form>
                               </div>
                           </div>
                       </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-xl-10 col-md-12 pl-4">
                    <h4 class="d-inline-block">
                        Events We Think You’ll Love <i class="fa fa-info-circle color-theme font-14"></i>
                    </h4>
                </div>
                <div class="col-xl-2 col-md-12 mt-n2">
                    <a href="#" class="btn color-theme">Add Favorites</a>
                </div>
            </div>

            <div class="row mt-3">
                @foreach($favoriteEvents as $event)
                    <div class="col-xl-4 col-12 mb-3">
                        <a href="{{ route('events.details', ['slug' => $event->slug]) }}">
                            <img class="" src="{{ $event->image }}" alt="Event Image" width="80%">
                            <h6>{{ $event->title }} . <br/>
                                <span class="text-dark"> <i class="fa fa-map-pin"></i> {{$event->city}}, {{ $event->state }}.</span>
                            </h6>
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="card-divs my-5 p-4 bg-light">
                <div class="row">
                    <div class="col-xl-2 d-none d-xl-block text-center pl-4">
                        <i class="fa fa-envelope fa-6x color-theme"></i>
                    </div>
                    <div class="col-xl-6 col-md-12">
                        <small class="small-color">GET EVENT NEWS YOU WANT</small><br>
                        <p class="pt-3">When you tell us who you love, we can tell you what they’re up to. Customize
                            your subscriptions to get the latest, breaking news about all things live.</p>
                    </div>
                    <div class="col-xl-4 col-md-12 mt-4">
                        <a href="#newsletterModal" data-toggle="modal"
                           class="btn reverse-theme bg-light border border-primary font-14 font-w">Newsletter
                            Subscription</a>
                    </div>
                </div>
            </div>

           {{-- <div class="shadow mb-n4 mt-4 p-4 rounded d-md-none">
                <h5 class="h5">We're here to help</h5>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                    Tenetur expedita, aut consequatur pariatur necessitatibus.
                </p>
            </div>--}}
        </div>
    </div>
    <form method="post" id="process-gift-voucher-purchase" action="{{ route('process.gift.voucher.payment') }}" class="form-horizontal" role="form">
        @csrf
        <input type="hidden" name="email" value="{{ auth()->user()->email }}"> {{-- required --}}
        <input type="hidden" name="amount" value=""> {{-- required in kobo --}}
        <input type="hidden" name="recipient" value="">
        <input type="hidden" name="quantity" value="1">
        <input type="hidden" name="currency" value="NGN">
        <input type="hidden" name="metadata" value="{{ json_encode($array = ['action' => 'gift_voucher_purchase']) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
        <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
    </form>
</div>
@endsection
