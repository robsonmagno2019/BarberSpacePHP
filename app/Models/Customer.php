<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Customer extends Model
{
    protected $fillable = [
        'birthDate',
        'phone',
        'photo',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function avaliations()
    {
        return $this->hasMany('App\Models\Avaliation');
    }

    public function schedules()
    {
        return $this->hasMany('App\Models\Scheduling');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }
}
