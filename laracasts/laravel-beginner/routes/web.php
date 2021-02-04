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

Route::get('/posts/{post}', 'PostsController@show');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    $articles = \App\Article::latest()->take(3)->get();

    return view('about', [
        'articles' => $articles
    ]);
});

Route::get('/articles', 'ArticlesController@index');
Route::get('/articles/{article}', 'ArticlesController@show');
