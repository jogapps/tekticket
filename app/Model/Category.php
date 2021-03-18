<?php

namespace App\Model;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use UUID;

    protected $guarded = ['id'];

    protected $casts = [
        'published' => 'boolean'
    ];

    protected $hidden = [
      'deleted_at', 'created_at', 'updated_at'
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function getStatus()
    {
        return $this->published ? 'Enabled' : 'Disabled';
    }

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }
}
