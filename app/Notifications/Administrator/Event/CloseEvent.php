<?php

namespace App\Notifications\Administrator\Event;

use App\Model\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CloseEvent extends Notification implements ShouldQueue
{
    use Queueable;

    public $event;

    /**
     * Create a new notification instance.
     *
     * @param Event $event
     * @return void
     */
    public function __construct(Event $event)
    {
        $this->event = $event;
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
            ->subject('Event Closed')
            ->line("An Event titled: {$this->event->title} dated on {$this->event->event_date->format('M jS, Y')} has been closed")
            ->line("For more information about your ticket sales, click on the link below")
            ->action("Event Page", route('backend.events.details', $this->event->id));
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
