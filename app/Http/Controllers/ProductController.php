<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduct;
use Illuminate\Http\Request;
use App\Product as Product;
use App\Seller as Seller;
use App\Tag as Tag;
use Response;

class ProductController extends Controller
{
  //List product
  public function index()
  {
    //TODO show tags and seller of all products
    $products = Product::all();
    $list_products;

    foreach ($products as $product) {
      $product_seller = Seller:where('id', $product->seller_id);
      $product_tags= Tag::where('product_id', $product->id);

      $product_info= [
      "tags" => $product_tags,
      "seller" => $product_seller,
      ];

      array_push($list_products, $product_info);
    }
    return Response::json(Product::all());
  }

  //Show information of one product
  public function show(Product $product)
  {
    $tags = Tag::where('product_id', $product->id);
    $seller = Seller:where('seller_id', $product->seller_id);

    $product_info= [
    "tags" => $tags,
    "seller" => $seller,
    ];

    return $product;
  }

  //Save a new product
  public function store(StoreProduct $request)
  {
    //TODO Hacer las tags si no existen
    $attributes = $request->all();

    $product = Product::create($attributes);
    return Response::json($product);
  }

  //Update product partially or completely
  public function update(Request $request,Product $product)
  {
    $attributes = $request->all();

    if ($request->isMethod('put')) {

      $this->validate($request, [
        'name' => 'required|string',
        'price' => 'required|numeric|min:0',
        'description' => 'required|string',
        'seller' => 'required|exists:sellers',
        'tags'=> 'required',
      ]);

    } elseif($request->isMethod('patch')){
      $this->validate($request, [
        'name' => 'string',
        'price' => 'numeric|min:0',
        'description' => 'string',
        'seller' => 'exists:sellers',
        'tags'=> 'requiered',
      ]);

    }

    $product->update($attributes);
    return $product;
  }

  //Delete a product
  public function destroy(Product $product)
  {
    $product->delete();
    return Response::json([],200);
  }

  //Reviews

  //Show reviews of one product
  public function showReviews(Product $product)
  {
    $reviews = Review::where('product_id', $product->id)
    return Response::json($reviews);
  }

  //Store new review of a product
  public function storeReviews(storeReview $request, Product $product)
  {
    $attributes = $request->all();
    $attributes->product_id = $id;
    $review = Review::create($attributes);

    return Response::json($product);
  }

  //Destroy a review of a product
  public function destroyReview(Review $review)
  {
    $review->delete();
    return Response::json([],200);
  }




}
