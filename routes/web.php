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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/actores', 'ActorController@directory');

Route::get('/actor/{id}', 'ActorController@show');

Route::get('/actores/buscar', 'ActorController@search');

Route::get('/actores/add', 'ActorController@add');

Route::post('/actores/add', 'ActorController@store');

Route::get('/actores/{id}/edit', 'ActorController@edit');

Route::post('/actores/{id}/edit', 'ActorController@store');
