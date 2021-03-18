<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use UUID;
    use SoftDeletes;

    protected $guarded = ['id'];

    protected $with = ['category', 'prices'];

    protected $casts = [
        'event_date' => 'datetime',
        'featured' => 'boolean',
        'published' => 'boolean',
    ];

    public function getTitleAttribute($value)
    {
        return ucwords($value);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function organizer()
    {
        return $this->belongsTo(Organizer::class);
    }

    public function prices()
    {
        return $this->hasMany(EventPrice::class);
    }

    public function soldTickets()
    {
        return $this->hasManyThrough(Ticket::class, EventPrice::class);
    }

    public function getLocation()
    {
        return ucwords($this->street_1 . ', ' . $this->city . ', ' . $this->state);
    }

    public function getImage()
    {
        return $this->image ?? 'default.jpg';
    }

    public function getImageAttribute($image)
    {
        return asset('uploads/events/' . $image);
    }

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    public function scopeDisabled($query)
    {
        return $query->where('published', false);
    }

    public function scopeOpen($query)
    {
        return $query->where('status', OPEN);
    }

    public function scopeClosed($query)
    {
        return $query->where('status', CLOSED);
    }

    public function getStatus()
    {
        return $this->status === OPEN ? 'Open' : 'Closed';
    }

    public function isClosed()
    {
        return $this->status === CLOSED;
    }
}
