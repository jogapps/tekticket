<?php

namespace App\Model;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use UUID;

    protected $guarded = ['id'];

    protected $casts = [
        'published' => 'boolean'
    ];

    protected $hidden = [
        'deleted_at', 'created_at', 'updated_at'
    ];

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function events()
    {
        return $this->hasManyThrough(Event::class, Category::class);
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
