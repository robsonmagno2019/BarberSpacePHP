<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DurationContract extends Model
{
    protected $fillable = [
        'createdate',
        'description',
    ];

    public function barbershopagreements()
    {
        return $this->hasMany('App\Models\BarbershopAgreement');
    }
}
