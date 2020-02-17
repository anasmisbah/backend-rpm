<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name','logo','description','profile','contact','contact_detail'
    ];
}
