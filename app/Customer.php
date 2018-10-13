<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  public function flights() {
    return $this->belongsTo(Flight::class);
  }
}
