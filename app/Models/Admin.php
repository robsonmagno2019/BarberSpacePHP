<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'document',
        'phone',
        'photo',
        'color_id',
        'user_id',
    ];

    public function color()
    {
        return $this->belongsTo('App\Models\Color');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function barbershops()
    {
        return $this->hasMany('App\Models\Barbershop');
    }
}
