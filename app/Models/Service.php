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
}
