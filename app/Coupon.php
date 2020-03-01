<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'code_coupon','distributor_id'
    ];

    public function distributor()
    {
        return $this->belongsTo('App\Distributor');
    }
}
