<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    protected $table = "promos";

    protected $fillable = [
        'name','description','image','slug','point','total','status','view','created_by'
    ];

    public function createdby()
    {
        return $this->belongsTo('App\User', 'created_by', 'id');
    }
}
