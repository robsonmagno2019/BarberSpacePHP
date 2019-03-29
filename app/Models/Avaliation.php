<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avaliation extends Model
{
    protected $fillable = [
        'createdate',
        'note',
        'comment',
        'admin_id',
        'barber_id',
        'customer_id',
        'barbershop_id',
    ];

    public function barber()
    {
        return $this->belongsTo('App\Models\Barber');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function barbershop()
    {
        return $this->belongsTo('App\Models\Barbershop');
    }
}
