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
Route::resource('/phones', 'PhonesController');
Route::resource('/orders', 'OrdersController', ['except' => ['create', 'store']]);
Route::resource('/shops', 'ShopsController');
Route::resource('users', 'UsersController',['except' => ['edit']]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', 'TestController@test');
