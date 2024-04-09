<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscribeEmail extends Model
{
    protected $table = 'email_subscription';

    protected $fillable = [
        'email_address'
    ];
}
