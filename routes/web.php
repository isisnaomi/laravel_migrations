<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*Products routes*/
Route::get('products','ProductController@index');
Route::get('products/{product}', 'ProductController@show');
Route::post('products', 'ProductController@store');
Route::put('products/{product}','ProductController@update');
Route::patch('products/{product}','ProductController@update');
Route::delete('products/{product}','ProductController@destroy');

Route::get('products/{product}/reviews','ProductController@showReviews');
Route::post('products/{product}/reviews','ProductController@storeReview');
Route::delete('products/{product}/reviews/{review}','ProductController@destroyReview');

/*Sellers routes*/
Route::get('sellers','SellerController@index');
Route::get('sellers/{seller}', 'SellerController@show');
Route::get('sellers/{seller}', 'SellerController@store');
Route::put('sellers/{seller}','SellerController@update');
Route::patch('sellers/{seller}','SellerController@update');
Route::delete('sellers/{seller}','SellerController@destroy');
/*Sellers addresses*/
Route::post('sellers/{seller}/address','SellerController@addAddress');
Route::put('sellers/{seller}/address','SellerController@updateAddress');
