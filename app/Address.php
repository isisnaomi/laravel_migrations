<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
  /* Get the seller located at this address */
  public function seller()
  {
    return $this->belongsTo('App\Seller');
  }
}
