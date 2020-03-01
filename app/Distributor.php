<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    protected $fillable = [
        'name','address','member','phone','email','website','logo','reward'
    ];

    public function employees()
    {
        return $this->hasMany('App\Employee');
    }

    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }

    public function coupons()
    {
        return $this->hasMany('App\Coupon');
    }

    public function vouchers()
    {
        return $this->hasMany('App\Voucher');
    }
}
