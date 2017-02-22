<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seller as Seller;
use App\Product as Product;
use App\Address as Address;
use App\Http\Requests\StoreSeller as StoreSeller;
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
    return $seller;
  }

  //Save new Seller
  public function store(StoreSeller $request)
  {
    $attributes = $request->all();
    $seller = Seller::create($attributes);

    $seller->save();

    return Response::json($seller);
  }

  //Update a Seller partially or completely
  public function update(StoreSeller $request,Seller $seller)
  {
    $attributes = $request->all();

    if ($request->isMethod('put')) {

      $this->validate($request, [
          'name' => 'required|string',
          'last_name' => 'required|string',
      ]);

    } elseif($request->isMethod('patch')) {
      $this->validate($request, [
          'name' => 'string',
          'last_name' => 'string',
      ]);
    }
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
  public function addAddress(StoreReview $request, Seller $seller)
  {
    $attributes = $request->all();
    $address = Address::create($attributes);
    $seller->address_id =$address->id;
    $seller->save();

    return Response::json($address);
  }

  //Update the address of a Seller
  public function updateAddress(Request $request, Seller $seller)
  {
    $attributes = $request->all();
    $address = Address::all()->where('id', $seller->address_id)->first();
    $address->update($attributes);


    return $address;
  }

}
