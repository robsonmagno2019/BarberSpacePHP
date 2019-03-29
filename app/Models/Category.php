<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'createdate',
        'description',
        'barbershop_id',
    ];

    public function barbershop()
    {
        return $this->belongsTo('App\Models\Barbershop');
    }

    public function services()
    {
        return $this->hasMany('App\Models\Service');
    }

    public function product()
    {
        return $this->hasMany('App\Models\Product');
    }
}
