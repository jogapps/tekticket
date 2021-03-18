<?php

namespace App\Notifications\Administrator;

use App\Model\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactUsNotification extends Notification
{
    use Queueable;

    public $contactUsMessage;

    /**
     * Create a new notification instance.
     *
     * @param Message $contactUsMessage
     */
    public function __construct(Message $contactUsMessage)
    {
        $this->contactUsMessage = $contactUsMessage;
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
            ->subject('New Contact Us Message')
            ->line('You have a new message from a user with the following data')
            ->line("Name: {$this->contactUsMessage['name']}")
            ->line("Phone: {$this->contactUsMessage['phone']}")
            ->line("Email: {$this->contactUsMessage['email']}")
            ->line("Subject: {$this->contactUsMessage['subject']}")
            ->line("Message: {$this->contactUsMessage['message']}");
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
