<?php

namespace App\Notifications\Organizer\Ticket;

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
        return ['mail', 'database'];
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
            ->subject('New Ticket Purchase')
            ->line("{$this->ticket->user->name} purchased a ticket for your upcoming event, details as follows")
            ->line("Ticket Details")
            ->line("Ticket Type: {$this->ticket->eventPrice->title}")
            ->line("Cost:" . number_format($this->ticket->amount,2))
            ->line("Event Details")
            ->line("Title: {$this->ticket->eventPrice->event->title}")
            ->line("Date: {$this->ticket->eventPrice->event->event_date->format('M jS, Y')}")
            ->line("Location: {$this->ticket->eventPrice->event->getLocation()}")
            ->line("For more information go to your event details page")
            ->action("Event Page", route('organizer.events.show', $this->ticket->eventPrice->event->id));
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
            'message' => "{$this->ticket->user->name} purchased a ticket for your upcoming event",
            'event_title' => $this->ticket->eventPrice->event->title,
            'link' => route('organizer.events.show', $this->ticket->eventPrice->event->id)
        ];
    }
}
