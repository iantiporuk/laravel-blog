<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'IndexController@index')->name('index');
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/subscription', 'SubscriptionController@index')->name('subscription');
Route::post('/subscription/subscribe', 'SubscriptionController@subscribe')->name('subscribe');
Route::get('/subscription/unsubscribe/{email}', 'SubscriptionController@unsubscribe')->name('unsubscribe');

Route::get('/contact', 'ContactUsController@index')->name('contact');

Route::get('/home', 'HomeController@index')->name('home');
