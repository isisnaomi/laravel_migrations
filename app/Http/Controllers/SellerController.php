<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seller as Seller;
use App\Product as Product;
use App\Seller as Seller;
use Response;

class SellerController extends Controller
{
  public function index()
  {
    return Response::json(Seller::all());
  }

  public function show(Seller $seller)
  {
    return $seller;
  }

  public function store(Request $request)
  {
    $attributes = $request->all();

    $product = Seller::create($attributes);
    return Response::json($product);
  }

  public function update(Request $request,Seller $seller)
  {
    $attributes = $request->all();

    $seller->update($attributes);
    return $seller;
  }

  public function destroy(Seller $seller)
  {
    $sellerProducts= Product::where('seller_id', $seller->id )->delete();
    $sellerAddress= Address::where('seller_id', $seller->id )->delete();
    $seller->delete();
    return Response::json([],200);
  }
}
