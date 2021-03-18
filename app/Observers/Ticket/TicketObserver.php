<?php

namespace App\Observers\Ticket;

use App\Model\Ticket;

class TicketObserver
{
    /**
     * Handle the event price "created" event.
     *
     * @param  \App\Model\Ticket  $ticket
     * @return void
     */
    public function created(Ticket $ticket)
    {
        $eventPrice = $ticket->eventPrice;

        if (!$eventPrice->is_unlimited) {
            $ticketSold = $eventPrice->soldTickets()->count();
            if ($ticketSold >= $eventPrice->ticket_available) {
                $eventPrice->is_on_sale = false;
                $eventPrice->save();
            }
        }
    }
}
