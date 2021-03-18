@extends('backend.layout.default')
@section('title','Events details')

@section('body')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3><small>Ticket Config</small></h3>
                </div>
            </div>
            <div class="clearfix"></div>
            @include('backend.includes.alert')

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('backend.wallet.update.config') }}" method="post">
                            @csrf
                            <div class="form-group col-md-6">
                                <label>Wallet Validity (In Days)</label>
                                <input type="number" value="{{ $config->wallet_validity_period }}" name="wallet_validity_period" class="form-control" required>
                            </div>
                            <div class="form-group col-md-2 pt-4">
                                <button type="submit" class="btn btn-block btn-info">Submit <i class="fa fa-check"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection
