<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
  protected $fillable = ['address_id','name','last_name'];
  /* Get the address associated with the seller */
  public function address()
  {
    return $this->hasOne('App\Address');
  }
}
