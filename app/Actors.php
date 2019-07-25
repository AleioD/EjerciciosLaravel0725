<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actors extends Model
{
  //public $table = "actors";
  // public $primaryKey = "id";
  //public $timestamps = true;
  public $guarded = [];

  public function getNombreCompleto(){
    return $this->first_name . " " . $this->last_name;
  }
}
