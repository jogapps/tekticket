<?php

use Illuminate\Database\Seeder;
use App\Model\WalletConfig;

class WalletConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $walletConfig = new WalletConfig;
        $walletConfig->wallet_validity_period = 30;
        $walletConfig->save();
    }
}
