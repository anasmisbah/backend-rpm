<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'quantity','total','pricing_date','billing_date','distributor_id'
    ];

    public function distributor()
    {
        return $this->belongsTo('App\Distributor');
    }
}
