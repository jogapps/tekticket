<?php

namespace App\Model;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use UUID;

    protected $guarded = ['id'];

    public function getImage()
    {
        return $this->image ?? 'default.png';
    }
}
