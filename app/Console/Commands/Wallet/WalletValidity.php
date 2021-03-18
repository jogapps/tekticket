<?php

namespace App\Console\Commands\Wallet;

use Illuminate\Console\Command;
use App\Model\Wallet;


class WalletValidity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wallet:validity';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check for wallet validity period';

    public $wallet;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Wallet $wallet)
    {
        parent::__construct();

        $this->wallet = $wallet;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $wallets = $this->wallet::where('valid_until', now()->subDays(1))->get();

        foreach ($wallets as $wallet) {
            $wallet->balance = ZERO;
            $wallet->valid_until = null;
            $wallet->save();

            //Notify the customer
        }
    }
}
