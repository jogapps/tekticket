<?php

namespace App\Model;

use App\Traits\UUID;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use UUID;

    protected $guarded = ['id'];

    protected $casts = [
        'valid_until' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactions()
    {
        return $this->morphMany(Transaction::class, 'transactionable');
    }

    public function getFormattedValidUntilDate()
    {
        return $this->valid_until ? Carbon::parse($this->valid_until)->format('F jS, Y') : null;
    }
}
