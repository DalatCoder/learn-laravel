<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts/{id}', function ($id) {
    return "Post with id: " . $id;
});

Route::get('/admin/posts/thisisalongurl', array('as' => 'admin.posts',  function () {

    $url = route('admin.posts');

    return 'This url is posts admin page, ' . $url;
}));
