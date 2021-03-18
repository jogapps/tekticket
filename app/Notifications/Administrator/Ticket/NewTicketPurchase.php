<?php

namespace App\Notifications\Administrator\Ticket;

use App\Model\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewTicketPurchase extends Notification implements ShouldQueue
{
    use Queueable;

    public $ticket;

    /**
     * Create a new notification instance.
     *
     * @param Ticket $ticket
     */
    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
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
            ->subject('Event Ticket Purchase')
            ->line("{$this->ticket->user->name} Purchased a ticket for an upcoming event, details as follows")
            ->line("Customer details")
            ->line("Name: {$this->ticket->user->name}")
            ->line("Email: {$this->ticket->user->email}")
            ->line("Organizer details")
            ->line("Name: {$this->ticket->eventPrice->event->organizer->name}")
            ->line("Email: {$this->ticket->eventPrice->event->organizer->email}")
            ->line("Event Details:")
            ->line("Title: {$this->ticket->eventPrice->event->title}")
            ->line("Date: {$this->ticket->eventPrice->event->title}")
            ->line("Location: {$this->ticket->eventPrice->event->getLocation()}")
            ->line("For more information go to your event details page")
            ->action("Event Page", route('backend.events.details', $this->ticket->eventPrice->event->id));
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
