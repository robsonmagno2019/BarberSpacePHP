<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'quantity',
        'price',
        'product_id',
        'service_id',
        'scheduling_id',
        'order_id',
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function service()
    {
        return $this->belongsTo('App\Models\Service');
    }

    public function scheduling()
    {
        return $this->belongsTo('App\Models\Scheduling');
    }

    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }

    public function total()
    {
        return $this->quantity * $this->price;
    }

    public function valid()
    {
        $result = false;

        if ($this->quantity > 0 && $this->price > 0) {
            if ($this->product_id > 0 || $this->service_id > 0 &&
            $this->scheduling_id > 0 || $this->order_id > 0) {
                $result = true;
            }
        } else {
            $result = false;
        }

        return $result;
    }
}
