<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Customer extends Model
{
    use Notifiable;

    protected $table = "customers";

    protected $fillable = [
        "full_name",
        "contact_number",
        "email",
        "post_code",
        "therapist_id",
        "status",
        "can_email",
        "can_call",
        'result'
    ];
}
