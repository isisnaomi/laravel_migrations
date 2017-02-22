<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Seller as Seller;
use App\Product as Product;
use App\Tag as Tag;
use App\Http\Requests\StoreProduct as StoreProduct;
use Response;

class ProductController extends Controller
{
  //List product
  public function index()
  {
    $products = Product::all();
    $list_products = array();
    $product_tags = array();

    foreach ($products as $product) {
      $product_seller = Seller::all()->where('id', $product->seller_id)->first()->name;

      $product_tags_id = DB::table('product_tag')->where('product_id',$product->id)->pluck('tag_id');
      foreach ($product_tags_id as $tag_id) {
        $product_tag = Tag::all()->where('id', $tag_id)->first()->name;
        array_push($product_tags, $product_tag);
      }


      $product_info= [
          "product"=>$product,
          "tags" => $product_tags,
          "seller" => $product_seller,
      ];

      array_push($list_products, $product_info);
    }
    return Response::json($list_products);
  }

  //Show information of one product
  public function show(Product $product)
  {
    $product_tags = array();
    $product_tags_id = DB::table('product_tag')->where('product_id',$product->id)->pluck('tag_id');

    foreach ($product_tags_id as $tag_id) {
      $product_tag = Tag::all()->where('id', $tag_id)->first()->name;
      array_push($product_tags, $product_tag);
    }
    $product_seller = Seller::all()->where('id', $product->seller_id)->first()->name;

    $product_info= [
        "product"=>$product,
        "tags" => $product_tags,
        "seller" => $product_seller,
    ];

    return $product_info;
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
    $reviews = Review::where('product_id', $product->id);
    return Response::json($reviews);
  }

  //Store new review of a product
  public function storeReviews(storeReview $request, Product $product)
  {
    $attributes = $request->all();
    $attributes->product_id = $product->id;
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
