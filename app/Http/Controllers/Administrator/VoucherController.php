<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Model\GiftVoucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function index()
    {
        $vouchers = GiftVoucher::where('balance', '>', 0)->get();

        return view('backend.voucher.index', compact('vouchers'));
    }
}
