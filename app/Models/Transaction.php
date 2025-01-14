<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    protected $fillable = [
        'user_id',
        'transaction_code',
        'total_price',
        'total_quantity',
        'payment_method_id',
        'status',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactionDetails()
    {
        return $this->hasMany(TransactionDetail::class);
    }

    public function payment()
    {
        return $this->belongsTo(PaymentMethod::class);
    }
}
