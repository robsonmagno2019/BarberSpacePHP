<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable = [
        'createdate',
        'name',
        'code',
    ];

    public function admins()
    {
        return $this->hasMany('App\Models\Admin');
    }

    public function barbers()
    {
        return $this->hasMany('App\Models\Barber');
    }

    public function schedules()
    {
        return $this->hasMany('App\Models\Scheduling');
    }
}
