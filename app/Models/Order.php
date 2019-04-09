<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'createdate',
        'number',
        'order_status_id',
        'customeravulse',
        'customer_id',
        'admin_id',
        'barber_id',
        'barbershop_id',
        'valueadmin',
        'valuebarber',
    ];

    public function order_status()
    {
        return $this->belongsTo('App\Models\OrderStatus');
    }

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }

    public function barber()
    {
        return $this->belongsTo('App\Models\Barber');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function barbershop()
    {
        return $this->belongsTo('App\Models\Barbershop');
    }

    public function items()
    {
        return $this->hasMany('App\Models\Item');
    }

    public function calculatePercetage($items)
    {
        $serviceValue = 0;
        $productValue = 0;

        foreach ($items as $item) {
            if ($item->product() != null && $item->product_id != null) {
                $productValue += $item->total();
            }

            if ($item->service() != null && $item->service_id != null) {
                $serviceValue += $item->total();
            }
        }

        if ($productValue > 0) {
            if ($this->barber->percentage > 0) {
                $this->valuebarber += ($serviceValue * $this->barber->percentage) / 100;
            }
            $this->valueadmin += ($serviceValue - (($serviceValue * $this->barber->percentage) / 100)) + $productValue;
        } else {
            if ($this->barber->percentage > 0) {
                $this->valuebarber += ($serviceValue * $this->barber->percentage) / 100;
            }
            $this->valueadmin += $serviceValue - (($serviceValue * $this->barber->percentage) / 100);
        }

        return $this->valuebarber;
    }

    public function subtotal()
    {
        $serviceValue = 0;
        $productValue = 0;

        foreach ($this->items() as $item) {
            if ($item->product() != null) {
                $productValue += $item->price * $item->quantity;
            } else {
                $serviceValue += $item->price * $item->quantity;
            }
        }

        return $serviceValue + $productValue;
    }

    public function add($item)
    {
        $item->order_id = $this->id;

        if ($item->valid()) {
        }
    }
}
