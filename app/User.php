<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'createdate',
        'name',
        'email',
        'password',
        'active',
        'is_superadmin',
        'is_admin',
        'is_barber',
        'is_customer',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function admins()
    {
        return $this->hasMany('App\Models\Admin');
    }

    public function customers()
    {
        return $this->hasMany('App\Models\Customer');
    }
}
