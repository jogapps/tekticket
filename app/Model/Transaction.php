<?php

namespace App\Model;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use UUID;

    protected $guarded = ['id'];

    public function transactionable()
    {
        return $this->morphTo();
    }
}
