<?php

namespace App\Http\Controllers\Administrator;

use App\Model\WalletConfig;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Wallet;

class WalletController extends Controller
{
    public function index()
    {
        $wallets = Wallet::where('balance', '>', 0)->get();
        return view('backend.wallet.index', compact('wallets'));
    }

    public function config()
    {
        $config = WalletConfig::first();
        return view('backend.wallet.settings', compact('config'));
    }

    public function updateConfig(Request $request)
    {
        $this->validate($request, [
           'wallet_validity_period' => 'required|numeric'
        ]);

        $config = WalletConfig::firstOrFail();
        $config->wallet_validity_period = $request->wallet_validity_period;
        $config->save();
        return back()->with('success', 'Updated successfully');
    }
}
