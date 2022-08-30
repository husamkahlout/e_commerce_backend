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

Route::get('/', 'design\HomeController@index')->name('index');
Route::get('/product-details', 'design\HomeController@product_details')->name('product-details');

Route::get('/push-notificaiton', 'NotificationController@index')->name('push-notificaiton');
Route::post('save-token','NotificationController@saveToken')->name('save-token');
Route::post('send-notification','NotificationController@sendNotification')->name('send-notification');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
