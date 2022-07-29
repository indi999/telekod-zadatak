<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'address',
        'date_of_birth',
        'payment',
    ];

    // payment mutator get,set EUR
    public function getPaymentAttribute($payment)
    {
        return $payment / 100;
    }
    public function setPaymentAttribute($payment)
    {
        $this->attributes['payment'] = $payment * 100;
    }
}
