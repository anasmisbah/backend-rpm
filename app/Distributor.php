<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    protected $fillable = [
        'name','address','member','phone','email','website','logo','loyalty','reward','coupon','transaction'
    ];

    public function employees()
    {
        return $this->hasMany('App\Employee');
    }


}
