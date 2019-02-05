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


Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', 'AuthController@logout');
    Route::match(['get', 'post'], '/edit', ['uses' => 'PagesEditController@execute', 'as' => 'pagesEdit']);
    Route::match(['get', 'post'], '/edit/{id}', ['uses' => 'EditController@execute', 'as' => 'edit']);
    Route::delete('/delete/{id}', ['uses' => 'DeleteController@execute', 'as' => 'delete']);
});


Route::post('/login', 'AuthController@login');
Route::get('/', ['uses' => 'HomeController@index', 'as' => 'home']);
Route::get('/{id}', ['uses' => 'PageController@show', 'as' => 'page']);



