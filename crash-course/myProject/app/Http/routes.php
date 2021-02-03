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

Route::get('/user/{id}/posts', function ($id) {

    $user = \App\User::find($id);

    $posts = $user->posts;
    dd($posts);

});

Route::get('/user/{id}/role', function ($id) {

    $user = \App\User::find($id);
    $roles = $user->roles()->get();

    dd($roles);

});

Route::get('/role/{id}/user', function ($id) {

    $role = \App\Role::find($id);
    $users = $role->users()->get();

    dd($users);

});

Route::get('/user/{id}/role/pivot', function ($id) {

    $user = \App\User::find($id);
    dd($user->pivot);

});

Route::get('/user/country/{id}', function ($country_id) {

    $country = \App\Country::find($country_id);
    dd($country->posts()->get());

});

