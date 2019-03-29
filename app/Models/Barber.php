<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barber extends Model
{
    protected $fillable = [
        'type_of_remuneration_id',
        'percentage',
        'salary',
        'phone',
        'photo',
        'color_id',
        'user_id',
        'barbershop_id',
    ];

    public function type_of_remuneration()
    {
        return $this->belongsTo('App\Models\TypeOfRemuneration');
    }

    public function color()
    {
        return $this->belongsTo('App\Models\Color');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function barbershop()
    {
        return $this->belongsTo('App\Models\Barbershop');
    }

    public function salaries()
    {
        return $this->hasMany('App\Models\Salary');
    }

    public function schedules()
    {
        return $this->hasMany('App\Models\Scheduling');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function paydayadvances()
    {
        return $this->hasMany('App\Models\PaydayAdvance');
    }

    public function avaliations()
    {
        return $this->hasMany('App\Models\Avaliation');
    }
}
