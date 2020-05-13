<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'IndexController@index')->name('index');
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/subscribe', 'SubscriptionController@index')->name('subscription');
Route::post('/subscribe/subscribe', 'SubscriptionController@subscribe')->name('subscribe');
Route::post('/subscribe/unsubscribe/{email}', 'SubscriptionController@unsubscribe')->name('unsubscribe');

Route::get('/contact', 'ContactUsController@index')->name('contact');

Route::get('/home', 'HomeController@index')->name('home');
