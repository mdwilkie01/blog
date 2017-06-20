<?php

Route::get('/', 'PostsController@index')->name('home');
Route::get('/posts', 'PostsController@index');
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::post('/posts/{post}', 'CommentsController@store');
Route::get('/posts/{post}', 'PostsController@show');

Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');



Route::get('/logout', 'SessionsController@destroy');

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');




