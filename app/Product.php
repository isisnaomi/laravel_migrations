<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  /* A product is sold by only one seller */
  public function seller()
  {
    return $this->hasOne('App\Seller');
  }

  /* Get the tags associated with the given product */
  public function tags()
  {
    return $this->belongsToMany('App\Tag');
  }

  /* Get the reviews associated with the given product */
  public function reviews()
  {
    return $this->hasMany('App\Review');
  }
}
