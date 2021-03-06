<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = [
        'name','address','phone','avatar','user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function code()
    {
        return $this->hasOne('App\DriverCode');
    }

    public function delivery()
    {
        return $this->hasMany('App\Delivery');
    }
}
