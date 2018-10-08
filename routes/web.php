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

Route::get('/', 'HomeController@index');
Route::get('/add','ContactController@add');
Route::post('/add','ContactController@store');
Route::get('/edit/{id}','ContactController@edit');
Route::post('/edit/{id}','ContactController@update');
Route::get('/delete/{id}','ContactController@delete');

Auth::routes();