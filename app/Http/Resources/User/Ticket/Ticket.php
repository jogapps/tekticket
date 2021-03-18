<?php

namespace App\Http\Resources\User\Ticket;

use Illuminate\Http\Resources\Json\JsonResource;

class Ticket extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'code' => $this->code,
            'amount' => $this->amount,
            'ticket_status' => $this->ticket_status,
            'created_at' => $this->created_at,
            'event_price' => [
                'id' => $this->event_price_id,
                'title' => $this->eventPrice->title,
                'is_on_sale' => $this->eventPrice->is_on_sale,
            ],
            'event' => [
                'id' => $this->eventPrice->event->id,
                'title' => $this->eventPrice->event->title,
                'status' => $this->eventPrice->event->status,
                'ticket_status' => $this->eventPrice->event->ticket_status,
                'image' => $this->eventPrice->event->image
            ]
        ];
    }
}
