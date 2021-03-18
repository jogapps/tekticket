<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\EventPrice;
use App\Model\Ticket;
use App\Model\TicketTransaction;
use App\Model\Transaction;
use App\Notifications\Customer\GiftVoucher\GiftVoucherReceived;
use App\Notifications\Organizer\Ticket\NewTicketPurchase as OrganizerTicketPurchaseNotification;
use App\Notifications\Administrator\Ticket\NewTicketPurchase as AdministratorTicketPurchaseNotification;
use App\Model\User;
use App\Model\GiftVoucher;
use App\Model\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Str;
use DB;
use Paystack;

class PaymentController extends Controller
{

    private $giftVoucher;
    private $eventPrice;
    private $wallet;

    public function __construct(GiftVoucher $giftVoucher, EventPrice $eventPrice, Wallet $wallet)
    {
        $this->giftVoucher = $giftVoucher;
        $this->eventPrice = $eventPrice;
        $this->wallet = $wallet;
    }

    public function processTicketPayment(Request $request)
    {
        $this->validate($request, [
            'amount' => 'required|numeric',
            //'ticket_qty' => 'required|numeric',
            'email' => 'required|email:filter',
            'currency' => 'required',
            'metadata' => 'required',
            'reference' => 'required'
        ]);

        $metaData = json_decode($request->metadata);
        $eventPrice = EventPrice::where('id', $metaData->event_price)->firstOrFail();
        $ticketQuantity = $request->session()->get('ticket_quantity');
        $amountToPay = $eventPrice->amount * $ticketQuantity ;
        $customerEWallet =  $request->user()->giftVoucher->balance + $request->user()->wallet->balance;
        //If Customer E-Wallet (i.e Giftvoucher balance + wallet balance is greater than amount to pay)
        if ($customerEWallet >= $amountToPay) {
            $transaction = [
                'transaction_status' => 'success',
                'transaction_for' => 'Ticket Purchase',
                'transaction_via' => 'Gift Voucher',
                'reference' => Str::uuid(),
                'amount' => $eventPrice->amount,
                'paid_at' => now(),
                'transaction_id' => time() . Str::random(5),
                'ip_address' => $request->ip(),
                'attempts' => 1,
                'channel' => 'Gift Voucher',
                'currency' => 'NGN',
                'fees' => 0,
                'customer_email' => $request->user()->email,
                'customer_code' => $request->user()->id,
                'transaction_date' => now(),
            ];
            DB::beginTransaction();
            $this->purchaseTicket(true, $request->user(), $eventPrice, $ticketQuantity, $transaction);
            DB::commit();
            return redirect(route('ticket.index'))->with('success','Ticket purchased successfully');
        }
        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    public function processGiftVoucherPayment(Request $request)
    {
        $this->validate($request, [
            'amount' => 'required|numeric',
            'email' => 'required|email:filter',
            'recipient' => 'required|email:filter|exists:users,email',
            'currency' => 'required',
            'metadata' => 'required',
            'reference' => 'required'
        ]);
        $request->session()->put('recipient', $request->recipient);
        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    public function paymentCallback(Request $request)
    {
        $paymentData = Paystack::getPaymentData();
        $transStatus = $paymentData['data']['status'];
        $transRef = $paymentData['data']['reference'];
        $amount = $paymentData['data']['amount'] / ONE_HUNDRED;
        $paidAt = $paymentData['data']['paid_at'];
        $transId = $paymentData['data']['id'];
        $ipAddress = $paymentData['data']['ip_address'];
        $transFees = $paymentData['data']['fees'] / ONE_HUNDRED;
        $transAttempts = $paymentData['data']['log']['attempts'];
        $transChannel = $paymentData['data']['channel'];
        $transCurrency = $paymentData['data']['currency'];
        $customerEmail = $paymentData['data']['customer']['email'];
        $customerCode = $paymentData['data']['customer']['customer_code'];
        $transDate = $paymentData['data']['transaction_date'];
        $user = User::where('email', $customerEmail)->firstOrFail();
        $action = $paymentData['data']['metadata']['action'];

        switch ($action) {
            case 'ticket_purchase':
                $eventPrice = EventPrice::findOrFail($paymentData['data']['metadata']['event_price']);
                $ticketQuantity = $request->session()->get('ticket_quantity');

                $transaction = [
                    'transaction_status' => $transStatus,
                    'transaction_for' => 'Ticket Purchase',
                    'transaction_via' => 'Paystack',
                    'reference' => $transRef,
                    'amount' => $eventPrice->amount,
                    'paid_at' => $paidAt,
                    'transaction_id' => $transId,
                    'ip_address' => $ipAddress,
                    'attempts' => $transAttempts,
                    'channel' => $transChannel,
                    'currency' => $transCurrency,
                    'fees' => $transFees,
                    'customer_email' => $customerEmail,
                    'customer_code' => $customerCode,
                    'transaction_date' => $transDate,
                ];

                DB::beginTransaction();
                $this->purchaseTicket(false, $user, $eventPrice, $ticketQuantity, $transaction);
                DB::commit();

                 return redirect(route('ticket.index'))->with('success', 'Ticket purchased successfully');

                break;

            case 'gift_voucher_purchase':
                $sender = User::where('email', $customerEmail)->firstOrFail();
                $user = User::where('email', $request->session()->get('recipient'))->firstOrFail();
                $giftVoucher = $this->giftVoucher::firstOrNew(['user_id' => $user->id]);
                $giftVoucher->balance += $amount;
                $giftVoucher->save();

                $transaction = new Transaction;
                $transaction->transactionable()->associate($giftVoucher);
                $transaction->amount = $amount;
                $transaction->reference = \Str::uuid();
                $transaction->meta = json_encode(['details' => "Received a gift voucher worth {$amount} from {$sender->name}"]);
                $transaction->save();

                //Notify User
                $user->notify(new GiftVoucherReceived($giftVoucher, $sender));

                return redirect(route('profile.index'))->with('success', 'Gift Voucher has been sent successfully');
        }
        //dd($paymentData);
    }

    private function purchaseTicket($eWallet = false, User $user, $eventPrice, $quantity = 1, $transaction=[])
    {
        $userWallet = $this->wallet::firstOrNew(['user_id' => $user->id]);
        $userGiftVoucher = $this->giftVoucher::firstOrNew(['user_id' => $user->id]);

        //IF payment is not done via E-Wallet(GiftVoucher or User Wallet)
        if (!$eWallet) {
            //Wallet
            $userWallet->balance = ZERO;
            $userWallet->save();

            //Gift Voucher
            $userGiftVoucher->balance = ZERO;
            $userGiftVoucher->save();

            $originalEWalletBalance = $userWallet->getOriginal('balance') + $userGiftVoucher->getOriginal('balance');
            if ($originalEWalletBalance > ZERO) {
                $transaction['transaction_via'] = 'Paysatck + E-Wallet';
            }

            //Else if Purchase ticket is done via E-Wallet (Voucher Balance + Wallet Balance)
        } else {
            $amountToPay = $eventPrice->amount * $quantity;

            if ($userWallet->balance >= $amountToPay) {
                $userWallet->balance -= $amountToPay;
                $userWallet->save();
                $amountToPay = ZERO;
            } else {
                $amountToPay -= $userWallet->balance;
                $userWallet->balance = ZERO;
                $userWallet->save();
            }


            if ($amountToPay > ZERO) {
                $userGiftVoucher->balance -= $amountToPay;
                $userGiftVoucher->save();
            }

        }
        $this->newTicket($user, $eventPrice, $quantity, $transaction);

    }

    private function newTicket($user, $eventPrice, $quantity, $transaction=[])
    {
        for ($i = 0; $i < $quantity; $i++) {
            $ticket = new Ticket;
            $ticket->user()->associate($user);
            $ticket->eventPrice()->associate($eventPrice);
            $ticket->amount = $eventPrice->amount;
            $ticket->code = time() . random_int(TWO, FIVE) . ($i + 1);
            $ticket->save();

            $newTransaction = new TicketTransaction;
            $newTransaction->ticket()->associate($ticket);
            $newTransaction->transaction_status = $transaction['transaction_status'];
            $newTransaction->transaction_for = $transaction['transaction_for'];
            $newTransaction->transaction_via = $transaction['transaction_via'];
            $newTransaction->reference = $transaction['reference'];
            $newTransaction->amount = $transaction['amount'];
            $newTransaction->paid_at = $transaction['paid_at'];
            $newTransaction->transaction_id = $transaction['transaction_id'];
            $newTransaction->ip_address = $transaction['ip_address'];
            $newTransaction->attempts = $transaction['attempts'];
            $newTransaction->channel = $transaction['channel'];
            $newTransaction->currency = $transaction['currency'];
            $newTransaction->fees = $transaction['fees'];
            $newTransaction->customer_email = $transaction['customer_email'];
            $newTransaction->customer_code = $transaction['customer_code'];
            $newTransaction->transaction_date = $transaction['transaction_date'];
            $newTransaction->save();


            $ticket->eventPrice->event->organizer->notify(new OrganizerTicketPurchaseNotification($ticket));

            //Notify Admin
            Notification::route('mail', config('app.support_email'))
                ->notify(new AdministratorTicketPurchaseNotification($ticket));
        }

    }
}
