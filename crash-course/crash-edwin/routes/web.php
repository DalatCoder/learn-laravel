<?php

use Illuminate\Support\Facades\DB;
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

/*
Route::get('/insert', function () {
    DB::insert("insert into posts(title, body) values (?, ?)", ['PHP with Laravel', 'PHP laravel is the best thing that has happend to PHP']);
});
*/

/*
Route::get('/read', function () {
    return var_dump(DB::selectOne('select * from posts where id = ?', [1]));
});
*/

Route::get('/update', function (){
    return DB::update('update posts set title = ? where id = 1', ['Updated title']);
});
