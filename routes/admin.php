<?php

Route::get('/', 'IndexController@index')->name('admin');

Route::get('/posts', 'PostController@index')->name('admin-posts');
Route::get('/posts/create', 'PostController@create')->name('admin-posts-create');
Route::post('/posts/create/submit', 'PostController@createSubmit')->name('admin-posts-create-submit');
Route::get('/posts/{id}/update', 'PostController@update')->name('admin-posts-update');
Route::post('/posts/{id}/update/submit', 'PostController@updateSubmit')->name('admin-posts-update-submit');
Route::get('/posts/{id}/activate', 'PostController@activate')->name('admin-posts-activate');
Route::get('/posts/{id}/deactivate', 'PostController@deactivate')->name('admin-posts-deactivate');
Route::get('/posts/{id}/delete', 'PostController@delete')->name('admin-posts-delete');
