<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    public function news()
    {
        return $this->belongsToMany('App\News');
    }

    public function event()
    {
        return $this->belongsToMany('App\Event');
    }
}
