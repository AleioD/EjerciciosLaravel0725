<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    public $table = "movies";
    // public $primaryKey = "id";
    //public $timestamps = true;
    public $guarded = [];
}
