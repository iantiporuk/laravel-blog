<?php

Route::get('/', 'IndexController@index')->name('index');
Route::resource('posts', 'PostController');
Route::resource('categories', 'CategoryController');
