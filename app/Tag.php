<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  /* Get the products associated with the given tag */
  public function products()
  {
    return $this->belongsToMany('App\Products');
  }
}
