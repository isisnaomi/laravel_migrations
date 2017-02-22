<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
  protected $fillable = ['address', 'city', 'state', 'country', 'zip_code'];
  /* Get the seller located at this address */
  public function seller()
  {
    return $this->belongsTo('App\Seller');
  }
}
