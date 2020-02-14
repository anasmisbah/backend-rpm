<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companyprofile extends Model
{
    protected $table = "companyprofiles";

    protected $fillable = [
        'name','url'
    ];
}
