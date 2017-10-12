<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/users', 'UserController@index');
Route::post('/users/create', 'UserController@create');
Route::get('/users/{id}', 'UserController@fetch');
Route::put('/users/{id}', 'UserController@modify');

Route::get('/groups/', 'GroupController@index');
Route::post('/groups/create', 'GroupController@create');
Route::put('/groups/{id}', 'GroupController@modify');