<?php

namespace App\Model;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;

class TicketTransaction extends Model
{
    use UUID;

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
