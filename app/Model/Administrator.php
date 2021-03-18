<?php

namespace App\Model;

use App\Traits\UUID;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Administrator extends Authenticatable
{
    use Notifiable;
    use UUID;

    protected $guarded = ['id'];

}
