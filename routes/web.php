<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/user/logout', 'HomeController@logout')->name('user.logout');

//Business Type
Route::get('/business/types/all','BusinessTypeController@index')->name('all.business.types');
Route::get('/business/type/add', 'BusinessTypeController@create')->name('add.business.type');
Route::post('/business/type/store', 'BusinessTypeController@store')->name('store.business.type');
Route::get('/edit/business/type/{id}', 'BusinessTypeController@EditBusinessType');
Route::post('/update/business/type/{id}', 'BusinessTypeController@UpdateBusinessType');

//Business Category
Route::get('/business/category/all','BusinessCategoryController@index')->name('all.business.category');
Route::get('/business/category/add', 'BusinessCategoryController@create')->name('add.business.category');
Route::post('/business/category/store', 'BusinessCategoryController@store')->name('store.business.category');
Route::get('/edit/business/category/{id}', 'BusinessCategoryController@EditBusinessCategory');
Route::post('/update/business/category/{id}', 'BusinessCategoryController@UpdateBusinessCategory');

//Business
Route::get('/pending/business', 'BusinessController@NewBusiness')->name('new.business');
Route::get('/view/new/business/{id}', 'BusinessController@ViewNewBusiness');
Route::get('/business/accept/{id}', 'BusinessController@BusinessAccept');
Route::get('/business/cancel/{id}', 'BusinessController@BusinessCancel');

Route::get('/business/approved','BusinessController@index')->name('approved.business');
Route::get('/view/business/{id}', 'BusinessController@ViewApprovedBusiness');


//Product Category
Route::get('/product/category/all','ProductCategoryController@index')->name('all.product.category');
Route::get('/product/category/add', 'ProductCategoryController@create')->name('add.product.category');
Route::post('/product/category/store', 'ProductCategoryController@store')->name('store.product.category');
Route::get('/edit/product/category/{id}', 'ProductCategoryController@EditProductCategory');
Route::post('/update/product/category/{id}', 'ProductCategoryController@UpdateProductCategory');


//Product
Route::get('/business/all','ProductController@index')->name('all.business');
Route::get('/business/add', 'ProductController@create')->name('add.business');
Route::post('/business/store', 'ProductController@store')->name('store.business');
Route::get('/edit/business/{id}', 'ProductController@EditBusiness');
Route::post('/update/business/{id}', 'ProductController@UpdateBusiness');
Route::get('/view/business/{id}', 'ProductController@ViewBusiness');
