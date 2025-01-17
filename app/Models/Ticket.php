<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use app\Models\Event;
use App\Models\TransactionDetail;

class Ticket extends Model
{
    protected $table = 'tickets';

    protected $fillable = [
        'event_id',
        'ticket_type',
        'price',
        'quantity',
        'sold_quantity'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function transactionDetails()
    {
        return $this->hasMany(TransactionDetail::class);
    }

     
    public static function getTicketsBoughtByUser($userId)
    {
        return self::whereHas('transactionDetails', function ($query) use ($userId) {
            $query->whereHas('transaction', function ($query) use ($userId) {
                $query->where('user_id', $userId)->where('status', 'success');
            });
        })->get();
    }
}
