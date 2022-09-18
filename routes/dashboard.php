<?php

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::post('/login/admin', 'Auth\LoginController@adminLogin');

Route::group(['prefix' => 'dashboard' , 'namespace' => 'dashboard' , 'middleware' => 'auth:admin'], function () {
    // Route Dashboard
    Route::get('/', 'DashboardController@index')->name('dashboard.index');

    // Route Admin
    Route::resource('admin', 'AdminController');
    Route::get('admin/destroy/{id}', 'AdminController@destroy')->name('admin.destroy');
    Route::post('admin/MultiDestroy', 'AdminController@Multidestroy')->name('admin.Multidestroy');

    // Route For Admin Profile
    Route::get('my-profile', 'AdminProfileController@index')->name('admin.profile');
    Route::put('my-profile', 'AdminProfileController@update')->name('admin.profileUpdate');

    // Route User
    Route::resource('user', 'UserController');
    Route::get('user/destroy/{id}', 'UserController@destroy')->name('user.destroy');
    Route::get('user/cart/{id}', 'UserController@userCart')->name('user.cart');
    Route::post('user/MultiDestroy', 'UserController@Multidestroy')->name('user.Multidestroy');

    // Route Categories
    Route::resource('category', 'CategoryController');
    Route::get('categoryProducts/{id}', 'CategoryController@categoryProducts')->name('category.products');
    Route::get('category/destroy/{id}', 'CategoryController@destroy')->name('category.destroy');
    Route::post('category/MultiDestroy', 'CategoryController@Multidestroy')->name('category.Multidestroy');

    // Route Role
    Route::resource('role', 'RoleController');
    Route::get('role/destroy/{id}', 'RoleController@destroy')->name('role.destroy');
    Route::post('role/MultiDestroy', 'RoleController@Multidestroy')->name('role.Multidestroy');

    // Route Color
    Route::resource('color', 'ColorController');
    Route::get('color/destroy/{id}', 'ColorController@destroy')->name('color.destroy');
    Route::post('color/MultiDestroy', 'ColorController@Multidestroy')->name('color.Multidestroy');

    // Route Color
    Route::resource('size', 'SizeController');
    Route::get('size/destroy/{id}', 'SizeController@destroy')->name('size.destroy');
    Route::post('size/MultiDestroy', 'SizeController@Multidestroy')->name('size.Multidestroy');

    // Route Brand
    Route::resource('brand', 'BrandController');
    Route::get('brand/destroy/{id}', 'BrandController@destroy')->name('brand.destroy');
    Route::post('brand/MultiDestroy', 'BrandController@Multidestroy')->name('brand.Multidestroy');

    // Route Slider
    Route::resource('slider', 'SliderController');
    Route::get('slider/destroy/{id}', 'SliderController@destroy')->name('slider.destroy');
    Route::post('slider/MultiDestroy', 'SliderController@Multidestroy')->name('slider.Multidestroy');

    // Route Coupon
    Route::resource('coupon', 'CouponController');
    Route::get('coupon/destroy/{id}', 'CouponController@destroy')->name('coupon.destroy');
    Route::post('coupon/MultiDestroy', 'CouponController@Multidestroy')->name('coupon.Multidestroy');

    // Route Coupon
    Route::resource('order', 'OrderController');
    Route::get('order/destroy/{id}', 'OrderController@destroy')->name('order.destroy');
    Route::post('order/MultiDestroy', 'OrderController@Multidestroy')->name('order.Multidestroy');

    // Route Product
    Route::resource('product', 'ProductController');
    Route::get('product/destroy/{id}', 'ProductController@destroy')->name('product.destroy');
    Route::post('product/MultiDestroy', 'ProductController@Multidestroy')->name('product.Multidestroy');
    Route::post('product/{product}', 'ProductController@upload')->name('product.upload');
    Route::get('image/destroy/{id}', 'ProductController@destroyImage')->name('images.destroy');

    // Question Answer
    Route::resource('questionAnswer', 'QuestionAnswerController');
    Route::get('questionAnswer/destroy/{id}', 'QuestionAnswerController@destroy')->name('questionAnswer.destroy');
    Route::post('questionAnswer/MultiDestroy', 'QuestionAnswerController@Multidestroy')->name('questionAnswer.Multidestroy');

    // Route Setting
    Route::get('setting', 'SettingController@index')->name('setting.index');
    Route::put('setting/update', 'SettingController@update')->name('setting.update');

    // Route Cart
    // Route::resource('cart', 'CartController');
    // Route::get('cart/destroy/{id}', 'CartController@destroy')->name('cart.destroy');

    // notifications
    Route::get('/push-notificaiton', 'NotificationController@index')->name('notification.index');
    Route::post('save-token','NotificationController@saveToken')->name('save-token');
    Route::post('send-notification','NotificationController@sendNotification')->name('send-notification');

});

Route::get('local/{lang?}', ['as' => 'local.change', 'uses' => 'Dashboard\LocalizationController@change']);