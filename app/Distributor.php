<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    protected $fillable = [
        'name','address','member','phone','email','website','logo','loyalty'
    ];

    public function employees()
    {
        return $this->hasMany('App\Employee');
    }


}
