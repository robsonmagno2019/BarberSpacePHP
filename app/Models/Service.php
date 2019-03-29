<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'createdate',
        'description',
        'duration',
        'price',
        'category_id',
        'barbershop_id',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function barbershop()
    {
        return $this->belongsTo('App\Models\Barbershop');
    }
}
