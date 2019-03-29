<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarbershopAgreement extends Model
{
    protected $fillable = [
        'createdate',
        'enddate',
        'plan_id',
        'barbershop_id',
        'duration_contract_id',
    ];

    public function durationcontract()
    {
        return $this->belongsTo('App\Models\DurationContract');
    }

    public function barbershop()
    {
        return $this->belongsTo('App\Models\Barbershop');
    }

    public function plan()
    {
        return $this->belongsTo('App\Models\Plan');
    }
}
