<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $fillable = [
        'title','description','image','slug','user_id','created_by'
    ];

    public function category()
    {
        return $this->belongsToMany('App\Category');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
