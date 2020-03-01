<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $fillable = [
        'code_voucher','promo_id','distributor_id'
    ];

    public function distributor()
    {
        return $this->belongsTo('App\Distributor');
    }

    public function promo()
    {
        return $this->belongsTo('App\Promo');
    }
}
