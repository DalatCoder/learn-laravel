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

/*
 * Admin Category
 */
Route::prefix('categories')->group(function() {

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

});


