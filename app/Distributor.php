<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    protected $fillable = [
        'name','address','member','address','phone','email','website'
    ];

    public function employees()
    {
        return $this->hasMany('App\Employees');
    }


}
