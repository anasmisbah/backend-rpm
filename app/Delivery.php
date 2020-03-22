<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $fillable = [
        'delivery_at','distributor_id','driver_id'
    ];

    protected $dates =[
        'delivery_at'
    ];
    public function driver()
    {
        return $this->belongsTo('App\Driver');
    }

    public function distributor()
    {
        return $this->belongsTo('App\Distributor');
    }
}
