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
        'organizer_name',
        'category',
        'image_url',
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
