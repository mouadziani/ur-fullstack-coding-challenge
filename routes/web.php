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
Route::view('/', 'shops-app')->middleware(['auth']);
Route::group(['prefix' => 'api', 'middleware' => 'auth'], function() {
	Route::get('shop', 'ShopController@index');
	Route::put('shop/like/{id}', 'ShopController@like');
	Route::put('shop/dislike/{id}', 'ShopController@dislike');
	Route::get('shop/prefrred-shop', 'ShopController@prefrredShop');
	Route::delete('shop/prefrred-shop/{id}/remove', 'ShopController@removePreferred');
});

// Generate fake data
Route::get('generate', function() {
    for ($i=0; $i < 100; $i++) { 
    	App\Models\Shop::create([
    		'name' => 'Shop ' . $i, 
    		'image' => 'https://picsum.photos/200', 
    		'distance' => 1 + $i, 
    		'likes' => rand(0, 50), 
    		'dislikes' => rand(0, 20) 
    	]);
    }
});