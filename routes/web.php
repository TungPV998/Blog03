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
Route::namespace('admin')->prefix("admin")->group(function () {
    Route::get('dashboard',"DashboardController@index")->name("dashboard.index");
    Route::prefix('category')->group(function () {
        Route::get('index',"CategoryController@index")->name("category.index");
        Route::get('create',"CategoryController@create")->name("category.create");
        Route::post('store',"CategoryController@store")->name("category.store");
        Route::post('update',"CategoryController@update")->name("category.update");
        Route::get('edit/{id}',"CategoryController@edit")->name("category.edit");
        Route::get('delete/{id}',"CategoryController@delete")->name("category.delete");
    });

});
