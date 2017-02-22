<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seller as Seller;
use App\Product as Product;
use App\Seller as Seller;
use Response;

class SellerController extends Controller
{
  //List all sellers
  public function index()
  {
    return Response::json(Seller::all());
  }

  //Show information of a seller
  public function show(Seller $seller)
  {
    return Response::json($seller);
  }

  //Save new Seller
  public function store(StoreSeller $request)
  {
    $attributes = $request->all();
    $seller = Seller::create($attributes);

    return Response::json($product);
  }

  //Update a Seller partially or completely
  public function update(StoreSeller $request,Seller $seller)
  {
    $attributes = $request->all();
    $seller->update($attributes);

    return $seller;
  }

  //Delete a Seller
  public function destroy(Seller $seller)
  {
    $sellerProducts= Product::where('seller_id', $seller->id )->delete();
  //  $sellerAddress= Address::where('seller_id', $seller->id )->delete();
    $seller->delete();

    return Response::json([],200);
  }

  //Add address to a Seller
  public function addAddress(Request $request)
  {
    $attributes = $request->all();
    $address = Address::create($attributes);

    return Response::json($address);
  }

  //Update the address of a Seller
  public function updateAddress(Request $request, Seller $seller)
  {
    $attributes = $request->all();
    $address = Address::where('seller_id', $seller->id)->update($attributes);

    return $seller;
  }

}
