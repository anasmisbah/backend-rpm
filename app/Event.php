<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $fillable = [
        'title','description','image','slug'
    ];

    public function category()
    {
        return $this->belongsToMany('App\Category');
    }
}
