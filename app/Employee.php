<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name','address','phone','avatar','user_id','type','distributor_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
