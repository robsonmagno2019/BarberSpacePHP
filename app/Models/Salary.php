<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $fillable = [
        'createdate',
        'price',
        'barber_id',
    ];

    public function barber()
    {
        return $this->belongsTo('App\Models\Barber');
    }

    public function createDateSalary()
    {
        $timestamp = new \DateTime();
        $splitTimeStamp = explode(' ', $timestamp);
        $date = $splitTimeStamp[0];
        $time = $splitTimeStamp[1];

        $value = explode('-', $date);
        $year = $value[0];
        $month = $value[1];
        $day = $value[2];

        $day = 1;

        $newDate = new \DateTime();
        $newDate->setDate($year, $month, $day);
        $newDate->setTime(0, 0, 0);
        $newDate->format('d-m-Y H:i:s');

        return $newDate;
    }

    public function update($price)
    {
        if ($price > 0) {
            $this->price += $price;
        }
    }

    public function decrement($price)
    {
        if ($price > 0) {
            $this->price -= $price;
        }
    }
}
