<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $table = 'payment_methods';

    protected $fillable = [
        'method_name',
        'method_image_url',
        'account_number',
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
