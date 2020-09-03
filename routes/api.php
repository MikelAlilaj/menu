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
Route::middleware('auth:api')->get('/all','Api\BusinessController@index');

Route::post('store_business', 'Api\BusinessController@store')->name('store_business');
Route::post('login_business', 'Api\BusinessController@login')->name('login_business');
Route::post('update_business/{id}', 'Api\BusinessController@updateById')->name('update_business');
Route::get('who_has_viewed', 'Api\BusinessController@whoHasViewed')->name('who_has_viewed');
Route::get('show_business/{id}', 'Api\BusinessController@showBusiness')->name('show_business');
Route::get('cities_list','Api\BusinessController@cities_list')->name('cities_list');
Route::get('business_category_list','Api\BusinessController@business_category_list')->name('business_category_list');

Route::get('category_list','Api\ProductController@categoryList');


Route::get('product_list','Api\ProductController@productListByBusinessId')->name('product_list');
Route::post('store_product', 'Api\ProductController@store')->name('store_product');
Route::get('most_viewed_products', 'Api\ProductController@mostViewedProducts')->name('most_viewed_products');






