<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaydayAdvance extends Model
{
    protected $fillable = [
        'createdate',
        'description',
        'price',
        'payday_advance_status_id',
        'barber_id',
    ];
}
