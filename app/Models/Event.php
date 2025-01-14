<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $fillable = [
        'name',
        'description',
        'location',
        'date',
        'time',
        'organizer_name',
        'event_categories_id',
        'image_url',
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function category()
    {
        return $this->belongsTo(EventCategory::class, 'event_categories_id');
    }
}
