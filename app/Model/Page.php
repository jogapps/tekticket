<?php

namespace App\Model;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use UUID;

    protected $guarded = ['id'];

    protected $casts = [
      'general' => 'boolean',
      'top_question' => 'boolean',
    ];

    public function scopeGeneral($query)
    {
        return $query->where('general', true);
    }

    public function scopeTopQuestion($query)
    {
        return $query->where('top_question', true);
    }
}
