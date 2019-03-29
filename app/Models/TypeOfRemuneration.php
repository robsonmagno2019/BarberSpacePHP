<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeOfRemuneration extends Model
{
    protected $fillable = [
        'createdate',
        'description',
    ];

    public function barbers()
    {
        return $this->belongsTo('App\Models\Barber');
    }
}
