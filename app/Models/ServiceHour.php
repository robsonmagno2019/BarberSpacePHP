<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceHour extends Model
{
    protected $fillable = [
        'createdate',
        'description',
        'period_id',
        'barbershop_id',
    ];

    public function period()
    {
        return $this->belongsTo('App\Models\Period');
    }

    public function barbershop()
    {
        return $this->belongsTo('App\Models\Barbershop');
    }
}
