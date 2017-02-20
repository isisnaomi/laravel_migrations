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
Route::get('products/{id}', 'ProductController@show');
Route::get('products/{id}', 'ProductController@store');
Route::put('products/{id}','ProductController@update');
Route::patch('products/{id}','ProductController@update');
Route::delete('products/{id}','ProductController@destroy');
/*Sellers routes*/
Route::get('sellers','SellerController@index');
Route::get('sellers/{id}', 'SellerController@show');
Route::get('sellers/{id}', 'SellerController@store');
Route::put('sellers/{id}','SellerController@update');
Route::patch('sellers/{id}','SellerController@update');
Route::delete('sellers/{id}','SellerController@destroy');