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



Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});


Route::name('admin.')->prefix('admin')->middleware(['auth'])->group(function () {

	// user
	Route::get('/user', 'Admin\UserController@index')->name('user');
    Route::get('/user/add', 'Admin\UserController@create')->name('user.add');
    Route::post('/user/store', 'Admin\UserController@store')->name('user.store');
    Route::get('/user/edit/{id}', 'Admin\UserController@edit')->name('user.edit');
    Route::patch('/user/update/{id}', 'Admin\UserController@update')->name('user.update');
    Route::get('/user/delete/{id}', 'Admin\UserController@delete')->name('user.delete');
    Route::get('/user/array/', 'Admin\UserController@arraydata')->name('user.array');
    Route::get('/user/status/{id}/{status}', 'Admin\UserController@changestatus')->name('user.changestatus');

    // profile    
    Route::get('/user/editprofile/{id}', 'Admin\UserController@editprofile')->name('user.editprofile'); 
    Route::patch('/user/updateprofile/{id}', 'Admin\UserController@updateprofile')->name('user.updateprofile'); 
    Route::get('/user/showprofile/{id}', 'Admin\UserController@showprofile')->name('user.showprofile');   
    Route::get('/user/changepassword', 'Admin\UserController@changepassword')->name('user.changepassword');
    Route::post('/user/changepassword', 'Admin\UserController@changepasswordsuccess')->name('user.changepassword.success');


    // Role
    Route::get('/role', 'Admin\RoleController@index')->name('role');
    Route::get('/role/add', 'Admin\RoleController@create')->name('role.add');
    Route::post('/role/store', 'Admin\RoleController@store')->name('role.store');
    Route::get('/role/edit/{id}', 'Admin\RoleController@edit')->name('role.edit');
    Route::patch('/role/update/{id}', 'Admin\RoleController@update')->name('role.update');
    Route::get('/role/delete/{id}', 'Admin\RoleController@delete')->name('role.delete');
    Route::get('/role/array/', 'Admin\RoleController@arraydata')->name('role.array');
    Route::get('/role/status/{id}/{status}', 'Admin\RoleController@changestatus')->name('role.changestatus');

    // Setting
    Route::get('setting', 'Admin\SettingController@index')->name('setting');
    Route::get('/setting/add', 'Admin\SettingController@create')->name('setting.add');
    Route::post('/setting/store', 'Admin\SettingController@store')->name('setting.store');
    Route::get('/setting/edit/{id}', 'Admin\SettingController@edit')->name('setting.edit');
    Route::patch('/setting/update/{id}', 'Admin\SettingController@update')->name('setting.update');
    Route::get('/setting/delete/{id}', 'Admin\SettingController@delete')->name('setting.delete');
    Route::get('/setting/array/', 'Admin\SettingController@arraydata')->name('setting.array');
    Route::get('/setting/status/{id}/{status}', 'Admin\SettingController@changestatus')->name('setting.changestatus');

    // user
    Route::get('/productcategory', 'Admin\ProductcategoryController@index')->name('productcategory');
    Route::get('/productcategory/add', 'Admin\ProductcategoryController@create')->name('productcategory.add');
    Route::post('/productcategory/store', 'Admin\ProductcategoryController@store')->name('productcategory.store');
    Route::get('/productcategory/edit/{id}', 'Admin\ProductcategoryController@edit')->name('productcategory.edit');
    Route::patch('/productcategory/update/{id}', 'Admin\ProductcategoryController@update')->name('productcategory.update');
    Route::get('/productcategory/delete/{id}', 'Admin\ProductcategoryController@delete')->name('productcategory.delete');
    Route::get('/productcategory/array/', 'Admin\ProductcategoryController@arraydata')->name('productcategory.array');
    Route::get('/productcategory/status/{id}/{status}', 'Admin\ProductcategoryController@changestatus')->name('productcategory.changestatus');


    // user
    Route::get('/vendor', 'Admin\VendorController@index')->name('vendor');
    Route::get('/vendor/add', 'Admin\VendorController@create')->name('vendor.add');
    Route::post('/vendor/store', 'Admin\VendorController@store')->name('vendor.store');
    Route::get('/vendor/edit/{id}', 'Admin\VendorController@edit')->name('vendor.edit');
    Route::patch('/vendor/update/{id}', 'Admin\VendorController@update')->name('vendor.update');
    Route::get('/vendor/delete/{id}', 'Admin\VendorController@delete')->name('vendor.delete');
    Route::get('/vendor/array/', 'Admin\VendorController@arraydata')->name('vendor.array');
    Route::get('/vendor/status/{id}/{status}', 'Admin\VendorController@changestatus')->name('vendor.changestatus');

    //brand
    Route::get('/brand', 'Admin\BrandController@index')->name('brand');
    Route::get('/brand/add', 'Admin\BrandController@create')->name('brand.add');
    Route::post('/brand/store', 'Admin\BrandController@store')->name('brand.store');
    Route::get('/brand/edit/{id}', 'Admin\BrandController@edit')->name('brand.edit');
    Route::patch('/brand/update/{id}', 'Admin\BrandController@update')->name('brand.update');
    Route::get('/brand/delete/{id}', 'Admin\BrandController@delete')->name('brand.delete');
    Route::get('/brand/array/', 'Admin\BrandController@arraydata')->name('brand.array');
    Route::get('/brand/status/{id}/{status}', 'Admin\BrandController@changestatus')->name('brand.changestatus');

    //brand
    Route::get('product', 'Admin\ProductController@index')->name('product');
    Route::get('/product/add', 'Admin\ProductController@create')->name('product.add');
    Route::post('/product/store', 'Admin\ProductController@store')->name('product.store');
    Route::get('/product/edit/{id}', 'Admin\ProductController@edit')->name('product.edit');
    Route::patch('/product/update/{id}', 'Admin\ProductController@update')->name('product.update');
    Route::get('/product/delete/{id}', 'Admin\ProductController@delete')->name('product.delete');
    Route::get('/product/array/', 'Admin\ProductController@arraydata')->name('product.array');
    Route::get('/product/status/{id}/{status}', 'Admin\ProductController@changestatus')->name('product.changestatus');

});