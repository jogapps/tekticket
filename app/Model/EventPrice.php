<?php

namespace App\Model;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;

class EventPrice extends Model
{
    use UUID;

    protected $guarded = ['id'];

    protected $casts = [
      'is_unlimited' => 'boolean',
      'is_on_sale' => 'boolean'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function isOnSale()
    {
        return $this->is_on_sale;
    }

    public function saleStatus()
    {
        return $this->is_on_sale ? 'ON SALE' : 'CLOSE';
    }

    public function soldTickets()
    {
        return $this->hasMany(Ticket::class, 'event_price_id');
    }

    public function getTitle()
    {
        return ucfirst($this->title);
    }
}
