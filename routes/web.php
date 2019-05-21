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

Auth::routes();
Route::view('shops', 'shops-app');
Route::group(['prefix' => 'api'], function() {
	Route::get('shop', 'ShopController@index');
	Route::put('shop/like/{id}', 'ShopController@like');
	Route::put('shop/dislike/{id}', 'ShopController@dislike');
	Route::get('shop/prefrred-shop', 'ShopController@prefrredShop');
	Route::delete('shop/prefrred-shop/{id}/remove', 'ShopController@removePreferred');
});
