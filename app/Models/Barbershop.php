<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barbershop extends Model
{
    protected $fillable = [
        'createdate',
        'name',
        'email',
        'coverphoto',
        'logo',
        'admin_id',
        'street',
        'number',
        'district',
        'city',
        'state',
        'zipcode',
        'complement',
    ];

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }

    public function servicehours()
    {
        return $this->hasMany('App\Models\ServiceHour');
    }

    public function categories()
    {
        return $this->hasMany('App\Models\Category');
    }

    public function avaliations()
    {
        return $this->hasMany('App\Models\Avaliation');
    }

    public function barbers()
    {
        return $this->hasMany('App\Models\Barber');
    }

    public function schedules()
    {
        return $this->hasMany('App\Models\Scheduling');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function paydayadvances()
    {
        return $this->hasMany('App\Models\PaydayAdvance');
    }

    public function services()
    {
        return $this->hasMany('App\Models\Service');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function salepromotions()
    {
        return $this->hasMany('App\Models\SalePromotion');
    }

    public function barbershopagreements()
    {
        return $this->hasMany('App\Models\BarbershopAgreement');
    }
}
