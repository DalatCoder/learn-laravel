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

use Illuminate\Support\Facades\DB;

Route::get('/user/{id}/post', function ($id) {

    $user = \App\User::find($id);

    $post = $user->post;
    dd($post);

});

Route::get('/post/{id}/user', function ($id) {

    $post = \App\Post::find($id);

    $user = $post->user;
    dd($user);

});

