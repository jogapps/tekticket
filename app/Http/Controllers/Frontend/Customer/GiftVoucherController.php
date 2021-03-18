<?php

namespace App\Http\Controllers\Frontend\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\GiftVourcher\ValidatePurchaseRequest;
use Illuminate\Http\Request;

class GiftVoucherController extends Controller
{
    public function getBalance(Request $request)
    {
        if ($request->ajax()) {
            return response()->json([
                'message' => 'Gift Voucher',
                'status' => 'success',
                'balance' => $request->user()->giftVoucher->balance
            ]);
        }
    }
    public function validateGiftVoucherPurchase(ValidatePurchaseRequest $request)
    {
        if ($request->amount < ONE) {
            return response()->json([
                'message' => 'Invalid amount'
            ],422);
        }

        return response()->json([
            'message' => 'Proceed to paystack',
            'email' => $request->email,
            'amount' => $request->amount * ONE_HUNDRED
        ],200);
    }
}
