<?php

namespace App\Notifications\Customer\GiftVoucher;

use App\Model\GiftVoucher;
use App\Model\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class GiftVoucherReceived extends Notification implements ShouldQueue
{
    use Queueable;

    public $giftVoucher;
    public $sender;

    /**
     * Create a new notification instance.
     *
     * @param GiftVoucher $giftVoucher
     * @param User $sender
     */
    public function __construct(GiftVoucher $giftVoucher, User $sender)
    {
        $this->giftVoucher = $giftVoucher;
        $this->sender = $sender;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('New Gift Voucher')
            ->line("You have received a gift voucher worth " . html_entity_decode('&#8358;') . number_format($this->giftVoucher->balance,2) . " from {$this->sender->name}" )
                    ->line('This Gift Voucher can be use to purchase Even Tickets')
                    ->line('Click on the link below see your account')
                    ->action("Profile", route('profile.index'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
