<?php

namespace App\Console\Commands\Event;

use App\Notifications\Customer\TicketRefund;
use Illuminate\Console\Command;
use App\Model\Event;
use App\Model\Wallet;
use App\Model\WalletConfig;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Administrator\Event\CloseEvent as AdministratorCloseEventNotification;
use App\Notifications\Organizer\Event\CloseEvent as OrganizerCloseEventNotification;

class CloseEvent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'event:close';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Close events after event date and refund money for unused tickets';

    public $wallet;
    public $walletConfig;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Wallet $wallet,  WalletConfig $walletConfig)
    {
        parent::__construct();

        $this->wallet = $wallet;
        $this->walletConfig = $walletConfig->first();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $events = Event::where('event_date', '<', now()->subDays(1))
            ->open()
            ->get();
        \Log::info($events);
        foreach ($events as $event) {
            $diffInHours = now()->diffInHours($event->event_date);
            if ($diffInHours > TWENTY_THREE) {
                $event->status = CLOSED;
                $event->ticket_status = CLOSED;
                $event->save();

                $pendingTickets = $event->soldTickets()->pending()->get();
                foreach ($pendingTickets as $ticket) {
                    //Refund to wallet
                    $userWallet = $this->wallet::firstOrNew(['user_id' => $ticket->user->id]);
                    $userWallet->balance += $ticket->amount;
                    $userWallet->valid_until = now()->addDays($this->walletConfig->wallet_validity_period);
                    $userWallet->save();

                    //Change ticket status
                    $ticket->ticket_status = REFUND;
                    $ticket->save();

                    //Notify The Customers
                    $ticket->user->notify(new TicketRefund($ticket));

                }

                //Notify The Event Organizers (About the closure, ticket sold and used and used ticket)
                $event->organizer->notify(new OrganizerCloseEventNotification($event));

                //Notify Administrators
                //Notify Admin
                Notification::route('mail', config('app.support_email'))
                    ->notify(new AdministratorCloseEventNotification($event));
            }
        }
    }
}
