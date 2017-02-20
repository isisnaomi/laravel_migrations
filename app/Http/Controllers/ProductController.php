<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduct;
use Illuminate\Http\Request;
use App\Product as Product;
use Response;

class ProductController extends Controller
{

  public function index()
  {
    return Response::json(Product::all());
  }

  public function show(Product $product)
  {
    return $product;
  }

  public function store(StoreProduct $request)
  {
    $attributes = $request->all();

    $product = Product::create($attributes);
    return Response::json($product);
  }

  public function update(Request $request,Product $product)
  {
    $attributes = $request->all();

    $product->update($attributes);
    return $product;
  }

  public function destroy(Product $product)
  {
    $product->delete();
    return Response::json([],200);
  }

}
