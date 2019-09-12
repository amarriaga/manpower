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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function() {
    Route::get('products','ProductController@index');
    Route::get('products/add','ProductController@create');
    Route::get('products/{id}','ProductController@show')->where('id','[0-9]+');
    Route::post('products','ProductController@store');
    Route::put('products','ProductController@update');
    Route::delete('products','ProductController@destroy');

    Route::get('categories','CategoryController@index');
    Route::get('categories/add','CategoryController@create');
    Route::get('categories/{id}','CategoryController@show')->where('id','[0-9]+');
    Route::post('categories','CategoryController@store');
    Route::put('categories','CategoryController@update');
    Route::delete('categories','CategoryController@destroy');
});