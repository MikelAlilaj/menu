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



Route::get('/user/logout', 'HomeController@logout')->name('user.logout');
Route::get('/password/change', 'HomeController@changePassword')->name('password.change');
Route::post('/password/update', 'HomeController@updatePassword')->name('password.update');

//Route::prefix('admins')->group(function () {

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/reports', 'HomeController@reports')->name('home');
Route::group(['prefix'=>'admin','middleware'=>['auth'=>'admin']],function(){

    //Business Type
    Route::get('/business/types/all','BusinessTypeController@index')->name('all.business.types');
    Route::get('/business/type/add', 'BusinessTypeController@create')->name('add.business.type');
    Route::post('/business/type/store', 'BusinessTypeController@store')->name('store.business.type');
    Route::get('/edit/business/type/{id}', 'BusinessTypeController@EditBusinessType')->name('edit.business.type');
    Route::post('/update/business/type/{id}', 'BusinessTypeController@UpdateBusinessType')->name('update.business.type');

    //Business Category
    Route::get('/business/category/all','BusinessCategoryController@index')->name('all.business.category');
    Route::get('/business/category/add', 'BusinessCategoryController@create')->name('add.business.category');
    Route::post('/business/category/store', 'BusinessCategoryController@store')->name('store.business.category');
    Route::get('/edit/business/category/{id}', 'BusinessCategoryController@EditBusinessCategory')->name('edit.business.category');
    Route::post('/update/business/category/{id}', 'BusinessCategoryController@UpdateBusinessCategory')->name('update.business.category');

//Business
    Route::get('/pending/business', 'BusinessController@NewBusiness')->name('new.business');
    Route::get('/view/new/business/{id}', 'BusinessController@ViewNewBusiness')->name('view.new.business');
    Route::get('/business/accept/{id}', 'BusinessController@BusinessAccept')->name('business.accept');
    Route::get('/business/cancel/{id}', 'BusinessController@BusinessCancel')->name('business.cancel');


    Route::get('/business/approved','BusinessController@index')->name('approved.business');
    Route::get('/view/active/business/{id}', 'BusinessController@ViewActiveBusiness')->name('ViewActive.business');;


//Product Category
    Route::get('/product/category/all','ProductCategoryController@index')->name('all.product.category');
    Route::get('/product/category/add', 'ProductCategoryController@create')->name('add.product.category');
    Route::post('/product/category/store', 'ProductCategoryController@store')->name('store.product.category');
    Route::get('/edit/product/category/{id}', 'ProductCategoryController@EditProductCategory')->name('edit.product.category');
    Route::post('/update/product/category/{id}', 'ProductCategoryController@UpdateProductCategory')->name('update.product.category');

});






//Product
Route::get('/products/all','ProductController@index')->name('all.products');
Route::get('/product/add', 'ProductController@create')->name('add.product');
Route::post('/product/store', 'ProductController@store')->name('store.product');
Route::get('/edit/product/{id}', 'ProductController@EditProduct')->name('edit.product');;
Route::post('/update/product/{id}', 'ProductController@UpdateProduct')->name('update.product');
Route::get('/view/product/{id}', 'ProductController@ViewProduct');


// For Show Sub category with ajax
Route::get('get/city/{state_id}', 'Auth\RegisterController@GetSubcat');

