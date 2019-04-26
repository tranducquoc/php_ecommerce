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

Route::get('/', 'HomeController@index')->name('welcome');

Route::group(['prefix' => 'user'], function () {
    Route::get('profile', 'User\UserController@index')->name('user.profile');
    Route::post('profile', 'User\UserController@update')->name('user.update');
    Route::post('suggest', 'User\UserController@requestProduct')->name('user.request');
});

Route::get('/shop', 'ShopController@index')->name('shop.index');

Route::group(['prefix' => 'shop'], function () {
    Route::get('/', 'ShopController@index')->name('shop.index');
    Route::get('{productSlug}', 'ShopController@show')->name('shop.show');
    Route::post('{productSlug}', 'Web\ReviewController@store')->name('review.store');
    Route::get('/filter/category/{param}', 'ShopController@filterCategory')->name('shop.filter.category');
    Route::get('/filter/price', 'ShopController@filterPrice')->name('shop.filter.price');
});

Route::resource('cart', 'CartController')->parameters([
    '/' => 'productSlug',
])->only(['index', 'destroy']);

Route::get('cart/increase/{productSlug}', 'CartController@updateIncrease')->name('cart.increase');

Route::get('cart/decrease/{productSlug}', 'CartController@updateDecrease')->name('cart.decrease');

Route::post('/cart/{productSlug}', 'CartController@store')->name('cart.store');

Route::resource('order', 'Web\OrderController')->only(['index', 'store']);

Auth::routes();
