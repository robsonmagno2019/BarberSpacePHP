<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scheduling extends Model
{
    protected $fillable = [
        'createdate',
        'schedulingdate',
        'service_hour_id',
        'color_id',
        'scheduling_status_id',
        'customeravulse',
        'customer_id',
        'admin_id',
        'barber_id',
        'barbershop_id',
    ];
}
