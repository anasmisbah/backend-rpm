<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "news";

    protected $fillable = [
        'title','description','image','slug'
    ];

    public function category()
    {
        return $this->belongsToMany('App\Category');
    }
}
