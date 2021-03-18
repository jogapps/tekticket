<?php

namespace App\Http\Controllers\Frontend\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function getBalance(Request $request)
    {
        if ($request->ajax()) {
            return response()->json([
                'message' => 'Wallet Balance',
                'status' => 'success',
                'balance' => $request->user()->wallet->balance,
                'valid_until' => $request->user()->wallet->valid_until
            ]);
        }
    }
}
