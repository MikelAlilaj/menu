<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('store_business', 'Api\BusinessController@store')->name('store_business');
Route::post('login_business', 'Api\BusinessController@login')->name('login_business');
Route::post('update_business/{id}', 'Api\BusinessController@updatebyid')->name('update_business');
Route::get('watch_business', 'Api\BusinessController@watched')->name('watched');
Route::get('show/{id}', 'Api\BusinessController@show')->name('show');

Route::get('category_list','Api\ProductController@categorylist');

Route::get('product_list','Api\ProductController@productlistByBusinessId');
Route::post('store_product', 'Api\ProductController@store')->name('store_product');
Route::get('watch_product', 'Api\ProductController@watched')->name('watched');

Route::get('watch_product', 'Api\ProductController@watched')->name('watched');

Route::middleware('auth:api')->get('/all','Api\BusinessController@index');


