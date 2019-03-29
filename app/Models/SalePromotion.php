<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalePromotion extends Model
{
    protected $fillable = [
        'createdate',
        'enddate',
        'description',
        'price',
        'product_id',
        'service_id',
        'barbershop_id',
    ];
}
