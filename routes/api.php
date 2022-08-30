<?php

use Illuminate\Http\Request;

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

// 'checkPassword'
Route::group(['middleware' => ['api'], 'namespace' => 'Api'], function() {

    // Categories
    Route::resource('categories', 'CategoriesController');
    Route::get('getChildCategory/{id}', 'CategoriesController@getChildCategory');

    // Products
    Route::resource('products', 'ProductController');
    Route::post('filter/products', 'ProductController@filterProduct');
    Route::get('getProductCategory/{id}', 'ProductController@getCategroyProducts');
    Route::get('getSales', 'ProductController@getSales');
    Route::get('lastProducts', 'ProductController@lastProducts');

    // Sliders
    Route::resource('sliders', 'SliderController');

    // Brands
    Route::resource('brands', 'BrandController');

    // Colors
    Route::resource('colors', 'ColorController');

    // Sizes
    Route::resource('sizes', 'SizeController');

    // Coupons
    Route::resource('coupons', 'CouponController');
    Route::post('check-coupon', 'CouponController@checkCoupon');

    // Cart
    Route::resource('cart', 'CartController');
    Route::get('cartItems/{id}', 'CartController@itemCart');

    // Addresses
    Route::resource('address', 'AddressController');
    Route::get('user/userAddress/{id}', 'AddressController@userAddress');
    Route::put('address/updateDefault/{id}', 'AddressController@updateDefault');

    // Favorite
    Route::get('userFavorite/{id}', 'FavoriteController@index');
    Route::post('userFavorite', 'FavoriteController@store');
    Route::delete('userFavorite/{id}', 'FavoriteController@destroy');

    // Reviews
    Route::resource('review', 'ReviewController');
    Route::get('getAvg/{id}', 'ReviewController@getAvg');

    // Checkout
    Route::resource('checkout', 'CheckoutController');

    // Notifications
    Route::put('update/token/{id}','NotificationController@updateToken');
    Route::get('notifications/{id}','NotificationController@notifications');

    // Orders
    Route::resource('orders', 'OrderController');
    Route::get('getOrderProducts/{id}', 'OrderController@getOrderProducts');
    Route::get('userOrders/{id}', 'OrderController@userOrders');
    Route::get('userDeliveryOrders/{id}', 'OrderController@userDeliveryOrders');

    // Users
    Route::put('user/{id}', 'UserController@update');
    Route::get('user/users', 'UserController@index');

    // User Auth
    Route::post('user/login','AuthUserController@login');
    Route::post('user/register','AuthUserController@register');
    Route::middleware('auth:sanctum')->get('user/logout', 'AuthUserController@logout');
    Route::middleware('auth:sanctum')->get('user', 'AuthUserController@getUser');

    // Question Answer
    Route::get('questionAnswer', 'QuestionAnswerController@index');

    Route::post('password/email', 'AuthUserController@forgot');
    // Route::post('password/reset', 'AuthUserController@reset');

});

// web vendor/bin/heroku-php-nginx -C nginx_app.conf /public