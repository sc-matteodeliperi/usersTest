<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/test', function(){
    dd(\DB::connection()->getDatabaseName());
});

Route::get('/users', 'UserController@index')->middleware('auth');
//Create
Route::get('/users/create', 'UserController@create');
Route::post('/users/store', 'UserController@store');
//Read
Route::get('/users/{$id}', 'UserController@show');
//Update
Route::put('/users{$id}/edit', 'UserController@edit');
Route::put('/users/update', 'UserController@update');
//Delete
Route::delete('/users{$id}/delete', 'UserController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
