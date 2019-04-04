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

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }

    public function barber()
    {
        return $this->belongsTo('App\Models\Barber');
    }

    public function barbershop()
    {
        return $this->belongsTo('App\Models\Barbershop');
    }

    public function color()
    {
        return $this->belongsTo('App\Models\Color');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function service_hour()
    {
        return $this->belongsTo('App\Models\ServiceHour');
    }

    public function scheduling_status()
    {
        return $this->belongsTo('App\Models\SchedulingStatus');
    }

    public function items()
    {
        return $this->hasMany('App\Models\Item');
    }
}
