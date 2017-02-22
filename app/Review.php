<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
  protected $fillable = ['product_id','reviewer_name', 'title', 'content'];
  /* Get the product that owns the review */
  public function product()
  {
    return $this->belongsTo('App\Product');
  }
}
