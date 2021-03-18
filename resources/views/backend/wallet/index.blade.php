@extends('backend.layout.default')
@section('title','Wallet')
@push('page-script')
    <script>
        $("#wallet-table").DataTable()
    </script>
@endpush
@section('body')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Wallet</h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    @include('backend.includes.alert')
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Wallet<small>List</small></h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="clearfix"></div>
                            <div class="x_content">

                                <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="list-tab" data-toggle="tab" href="#customers" role="tab" aria-controls="list" aria-selected="true">Users</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="customers" role="tabpanel" aria-labelledby="list-tab">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card-box table-responsive">
                                                    <table id="wallet-table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                        <thead>
                                                        <tr>
                                                            <th>Customer Name</th>
                                                            <th>Customer Email</th>
                                                            <th>Balance</th>
                                                            <th>Valid Until</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($wallets as $wallet)
                                                            <tr>
                                                                <td>{{ $wallet->user->name }}</td>
                                                                <td>{{ $wallet->user->email }}</td>
                                                                <td>&#8358;{{ number_format($wallet->balance,2) }}</td>
                                                                <td>{{ $wallet->valid_until->format('M jS, Y') }}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>


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
        </div>
    </div>
@endsection
