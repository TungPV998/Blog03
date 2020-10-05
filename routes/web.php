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

//Route::get('/home', function () {
//    return view('frontend.home');
//});

Route::namespace('admin')->prefix("admin")->group(function () {
    Route::get('form-login',"LoginController@getLoginForm")->name("login.form");
    Route::get('dashboard',"DashboardController@index")->name("dashboard.index");
    Route::prefix('category')->group(function () {
        Route::get('index',"CategoryController@index")->name("category.index");
        Route::get('create',"CategoryController@create")->name("category.create");
        Route::post('store',"CategoryController@store")->name("category.store");
        Route::post('update/{id}',"CategoryController@update")->name("category.update");
        Route::get('edit/{id}',"CategoryController@edit")->name("category.edit");
        Route::get('delete/{id}',"CategoryController@delete")->name("category.delete");
    });
    Route::prefix('products')->group(function () {
        Route::get('index',"ProductController@index")->name("products.index");
        Route::get('create',"ProductController@create")->name("products.create");
        Route::post('store',"ProductController@store")->name("products.store");
        Route::post('update/{id}',"ProductController@update")->name("products.update");
        Route::get('edit/{id}',"ProductController@edit")->name("products.edit");
        Route::get('delete/{id}',"ProductController@delete")->name("products.delete");
    });
    Route::prefix('slider')->group(function () {
        Route::get('index',"SliderController@index")->name("slider.index");
        Route::get('create',"SliderController@create")->name("slider.create");
        Route::post('store',"SliderController@store")->name("slider.store");
        Route::post('update/{id}',"SliderController@update")->name("slider.update");
        Route::get('edit/{id}',"SliderController@edit")->name("slider.edit");
        Route::get('delete/{id}',"SliderController@delete")->name("slider.delete");
    });
    Route::prefix('atribute')->group(function () {
        Route::get('index',"AtributeController@index")->name("attribute.index");
        Route::get('create',"AtributeController@create")->name("attribute.create");
        Route::post('store',"AtributeController@store")->name("attribute.store");
        Route::post('update/{id}',"AtributeController@update")->name("attribute.update");
        Route::get('edit/{id}',"AtributeController@edit")->name("attribute.edit");
        Route::get('delete/{id}',"AtributeController@delete")->name("attribute.delete");
    });
});
Route::namespace('site')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/list-product/{id}', 'HomeController@getListProduct')->name('childCategory.listProduct');
    Route::get('/detail-product/{id}', 'ProductController@detailProduct')->name('product.detailProduct');
    Route::get('/buy-product/{id}', 'ShoppingCartController@store')->name('shopping.buy_cart');
    Route::get('/add-product/{id}', 'ShoppingCartController@add')->name('shopping.add_cart');
    Route::get('/trang-ca-nhan', 'ProfileController@show')->name('profile.show');
});
Route::namespace('Auth')->group(function (){
    Route::get("dang-ky-thanh-vien","RegisterController@formRegister")->name("register.form");
    Route::post("register","RegisterController@store")->name("register.store");
    Route::get("dang-nhap","LoginController@formLogin")->name("login.form");
    Route::post("login","LoginController@checkLogin")->name("login.checkLogin");
    Route::get("dang-xuat","LoginController@logout")->name("login.logout");
});



Route::get('/list/product', function () {
    return view('frontend.listProduct');
});
