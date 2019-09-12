<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('products','Api\ProductController@index');
Route::get('products/{id}','Api\ProductController@show')->where('id','[0-9]+');
Route::post('products','Api\ProductController@store');
Route::put('products','Api\ProductController@update');
Route::delete('products','Api\ProductController@destroy');

Route::get('categories','Api\CategoryController@index');
Route::get('categories/{id}','Api\CategoryController@show')->where('id','[0-9]+');
Route::post('categories','Api\CategoryController@store');
Route::put('categories','Api\CategoryController@update');
Route::delete('categories','Api\CategoryController@destroy');