<?php

namespace App\Model;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use UUID;

    //protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function eventPrice()
    {
        return $this->belongsTo(EventPrice::class, 'event_price_id');
    }

    public function transaction()
    {
        return $this->hasOne(TicketTransaction::class);
    }

    public function scopePending($query)
    {
        $query->where('ticket_status', 'pending');
    }

    public function scopeUsed($query)
    {
        $query->where('ticket_status', 'used');
    }

    public function scopeRefund($query)
    {
        $query->where('ticket_status', 'refund');
    }

    public function getStatus()
    {
        return ucfirst($this->ticket_status);
    }

}
