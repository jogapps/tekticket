<?php

namespace App\Model;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use UUID;

    protected $guarded = ['id'];

    protected $casts = [
      'general' => 'boolean',
      'customer' => 'boolean',
      'organizer' => 'boolean'
    ];

    public function scopeOrganizer($query)
    {
        $query->where('organizer', true);
    }

    public function scopeCustomer($query)
    {
        $query->where('customer', true);
    }

}
