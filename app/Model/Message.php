<?php

namespace App\Model;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use UUID;

    protected $guarded = ['id'];
}
