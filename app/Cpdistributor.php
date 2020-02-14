<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cpdistributor extends Model
{
    protected $table = "cpdistributors";

    protected $fillable = [
        'name','contact','url'
    ];
}
