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

Route::get('/', [
    'as' => 'home',
    'uses' => 'HomeController@index'
]);

Route::get('/admin', [
    'as' => 'admin.home',
    'uses' => 'AdminController@index'
]);

Route::get('/dashboard', [
    'as' => 'admin.dashboard',
    'uses' => 'AdminController@show_dashboard'
]);

Route::post('/admin-dashboard', [
    'as' => 'admin.login',
    'uses' => 'AdminController@dashboard'
]);

Route::get('/logout', [
    'as' => 'admin.logout',
    'uses' => 'AdminController@logout_admin'
]);

Route::prefix('admin')->group(function () {
    Route::prefix('categories')->group(function () {

        Route::get('/', [
            'as' => 'categories.index',
            'uses' => 'AdminCategoryController@index'
        ]);

        Route::get('/create', [
            'as' => 'categories.create',
            'uses' => 'AdminCategoryController@create'
        ]);

        Route::post('/store', [
            'as' => 'categories.store',
            'uses' => 'AdminCategoryController@store'
        ]);

        Route::get('/status/{id}/active', [
            'as' => 'categories.active-status',
            'uses' => 'AdminCategoryController@active_status'
        ]);

        Route::get('/status/{id}/inactive', [
            'as' => 'categories.inactive-status',
            'uses' => 'AdminCategoryController@inactive_status'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'categories.edit',
            'uses' => 'AdminCategoryController@edit'
        ]);

        Route::put('/update/{id}', [
            'as' => 'categories.update',
            'uses' => 'AdminCategoryController@update'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'categories.delete',
            'uses' => 'AdminCategoryController@delete'
        ]);
    });

    Route::prefix('brands')->group(function () {
        Route::get('/', [
            'as' => 'brands.index',
            'uses' => 'AdminBrandController@index'
        ]);

        Route::get('/create', [
            'as' => 'brands.create',
            'uses' => 'AdminBrandController@create'
        ]);

        Route::post('/store', [
            'as' => 'brands.store',
            'uses' => 'AdminBrandController@store'
        ]);
    });
});


