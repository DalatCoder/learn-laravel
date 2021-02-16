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
Route::get('/home', function () {
    return view('home');
});

Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@loginAdmin')->name('login.show');
    Route::post('/', 'AdminController@postLoginAdmin')->name('login.login');

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

        Route::get('/edit/{id}', [
            'as' => 'menus.edit',
            'uses' => 'MenuController@edit'
        ]);

        Route::put('/update/{id}', [
            'as' => 'menus.update',
            'uses' => 'MenuController@update'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'menus.delete',
            'uses' => 'MenuController@delete'
        ]);
    });

    Route::prefix('products')->group(function () {
        Route::get('/', [
            'as' => 'products.index',
            'uses' => 'AdminProductController@index'
        ]);

        Route::post('/', [
            'as' => 'products.store',
            'uses' => 'AdminProductController@store'
        ]);

        Route::get('/create', [
            'as' => 'products.create',
            'uses' => 'AdminProductController@create'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'products.edit',
            'uses' => 'AdminProductController@edit'
        ]);

        Route::put('/update/{id}', [
            'as' => 'products.update',
            'uses' => 'AdminProductController@update'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'products.delete',
            'uses' => 'AdminProductController@delete'
        ]);
    });

    Route::prefix('sliders')->group(function () {
       Route::get('/', [
           'as' => 'sliders.index',
           'uses' => 'AdminSliderController@index'
       ]);

       Route::get('/create', [
           'as' => 'sliders.create',
           'uses' => 'AdminSliderController@create'
       ]);

       Route::post('/store', [
           'as' => 'sliders.store',
           'uses' => 'AdminSliderController@store'
       ]);

       Route::get('/edit/{id}', [
           'as' => 'sliders.edit',
           'uses' => 'AdminSliderController@edit'
       ]);

       Route::put('/update/{id}', [
           'as' => 'sliders.update',
           'uses' => 'AdminSliderController@update'
       ]);

       Route::get('/delete/{id}', [
           'as' => 'sliders.delete',
           'uses' => 'AdminSliderController@delete'
       ]);
    });

    Route::prefix('settings')->group(function () {
       Route::get('/', [
           'as' => 'settings.index',
           'uses' => 'AdminSettingController@index'
       ]);

       Route::get('/create', [
           'as' => 'settings.create',
           'uses' => 'AdminSettingController@create'
       ]);

       Route::post('/store', [
           'as' => 'settings.store',
           'uses' => 'AdminSettingController@store'
       ]);
    });
});
