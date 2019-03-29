<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'createdate',
        'title',
        'quantity',
        'price',
        'weight',
        'category_id',
        'barbershop_id',
    ];
}
