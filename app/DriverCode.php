<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriverCode extends Model
{
    protected $table = "drivercodes";

    protected $fillable = [
        'code','status'
    ];

    public function driver()
    {
        return $this->belongsTo('App\Driver');
    }
}
