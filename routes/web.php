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

Route::get('/', 'BookController@index');
Route::get('/book', 'BookController@addBook');
Route::post('/book', 'BookController@store');

Route::post('/book/update/{id}', 'BookController@updateBook');
Route::get('/book/edit/{id}', 'BookController@getBookByEdit');
Route::get('/book/{id}', 'BookController@getBookById');

Route::post('/book/remove/{id}', 'BookController@removeBook');
