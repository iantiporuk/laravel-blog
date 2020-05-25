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

Route::get('/categories', 'CategoryController@index')->name('admin-categories');
Route::get('/categories/create', 'CategoryController@create')->name('admin-categories-create');
Route::post('/categories/create/submit', 'CategoryController@createSubmit')->name('admin-categories-create-submit');
Route::get('/categories/{id}/update', 'CategoryController@update')->name('admin-categories-update');
Route::post('/categories/{id}/update/submit', 'CategoryController@updateSubmit')->name('admin-categories-update-submit');
Route::get('/categories/{id}/activate', 'CategoryController@activate')->name('admin-categories-activate');
Route::get('/categories/{id}/deactivate', 'CategoryController@deactivate')->name('admin-categories-deactivate');
Route::get('/categories/{id}/delete', 'CategoryController@delete')->name('admin-categories-delete');
