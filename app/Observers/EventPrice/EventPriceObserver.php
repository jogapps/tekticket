<?php

namespace App\Observers\EventPrice;

use App\Model\EventPrice;

class EventPriceObserver
{
    /**
     * Handle the event price "created" event.
     *
     * @param  \App\Model\EventPrice  $eventPrice
     * @return void
     */
    public function created(EventPrice $eventPrice)
    {
        if ($eventPrice->ticket_available < ONE) {
            $eventPrice->is_unlimited = true;
            $eventPrice->save();
        }
    }

    /**
     * Handle the event price "updated" event.
     *
     * @param  \App\Model\EventPrice  $eventPrice
     * @return void
     */
    public function updated(EventPrice $eventPrice)
    {

    }

    /**
     * Handle the event price "deleted" event.
     *
     * @param  \App\Model\EventPrice  $eventPrice
     * @return void
     */
    public function deleted(EventPrice $eventPrice)
    {
        //
    }

    /**
     * Handle the event price "restored" event.
     *
     * @param  \App\Model\EventPrice  $eventPrice
     * @return void
     */
    public function restored(EventPrice $eventPrice)
    {
        //
    }

    /**
     * Handle the event price "force deleted" event.
     *
     * @param  \App\Model\EventPrice  $eventPrice
     * @return void
     */
    public function forceDeleted(EventPrice $eventPrice)
    {
        //
    }
}
