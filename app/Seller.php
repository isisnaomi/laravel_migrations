<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
  /* Get the address associated with the seller */
  public function address()
  {
    return $this->hasOne('App\Address');
  }
}
