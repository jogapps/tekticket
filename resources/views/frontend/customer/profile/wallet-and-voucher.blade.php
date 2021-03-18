@extends('frontend.customer.profile.layout.default')
@section('title', 'Wallet and Voucher Transactions')
@push('custom-script')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
@endpush
@section('body')
    <div class="container-fluid account-overview my-5">
        <h1 class="h1 font-w d-none d-md-block">Account Overview</h1>
        <h4 class="h4 font-w d-md-none">Account Overview</h4>
        @include('frontend.customer.includes.alert')
        <div class="row">
            @include('frontend.customer.profile.partial.sidebar')
            <div class="col-lg-9 col-md-8 px-">
                <a href="{{ route('profile.index') }}" class="btn btn-sm btn-outline-info float-right"><i class="fa fa-arrow-left"></i> Back to profile</a>
                <h5 class="my-4"> Voucher Log
                </h5>
                <table id="example" class="ui celled table" style="width:100%">
                    <thead>
                    <tr>
                        <th>Account</th>
                        <th>Amount</th>
                        <th>Reference</th>
                        <th>Details</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($transactions as $transaction)
                        <tr>
                            <td>@if($transaction->transactionable_type === \App\Model\GiftVoucher::class)
                                    Gift Voucher
                                @else
                                    Wallet
                                @endif
                            </td>
                            <td>&#8358;{{ number_format($transaction->amount,2) }}</td>
                            <td>{{ $transaction->reference }}</td>
                            <td>{{ json_decode($transaction->meta)->details }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
