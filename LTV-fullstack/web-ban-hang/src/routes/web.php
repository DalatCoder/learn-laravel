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

Route::get('/home', function () {
    return view('home');
});

Route::prefix('categories')->group(function () {
    Route::get('/', [
        'as' => 'categories.index',
        'uses' => 'CategoryController@index'
    ]);

    Route::post('/', [
        'as' => 'categories.store',
        'uses' => 'CategoryController@store'
    ]);

    Route::get('/create', [
        'as' => 'categories.create',
        'uses' => 'CategoryController@create'
    ]);

    Route::get('/edit/{id}', [
        'as' => 'categories.edit',
        'uses' => 'CategoryController@edit'
    ]);

    Route::put('/update/{id}', [
        'as' => 'categories.update',
        'uses' => 'CategoryController@update'
    ]);

    Route::get('/delete/{id}', [
        'as' => 'categories.delete',
        'uses' => 'CategoryController@delete'
    ]);
});

Route::prefix('menus')->group(function () {
   Route::get('/', [
      'as' => 'menus.index',
      'uses' => 'MenuController@index'
   ]);

   Route::post('/', [
       'as' => 'menus.store',
       'uses' => 'MenuController@store'
   ]);

   Route::get('/create', [
       'as' => 'menus.create',
       'uses' => 'MenuController@create'
   ]);
});

