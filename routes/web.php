<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('home'); })->name('home');

Route::get('/sign-in', function () { return view('signin'); })->name('sign-in-get');
Route::post('/sign-in', 'SignInController@signIn')->name('sign-in-post');

Route::get('/sign-up', function () { return view('signup'); })->name('sign-up-get');
Route::post('/sign-up', 'SignUpController@signUp')->name('sign-up-post');
