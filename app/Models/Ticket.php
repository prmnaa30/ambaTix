<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use app\Models\Event;

class Ticket extends Model
{
    protected $table = 'tickets';

    protected $fillable = [
        'event_id',
        'ticket_type',
        'price',
        'quantity',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
