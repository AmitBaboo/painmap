<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentHistory extends Model
{
    protected $table = "payment_history";

    protected $fillable = [
        'user_id',
        'payment_date',
        'plan_id',
        'amount_paid',
        'card_brand'
    ];
}
