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

Route::get('/read', function () {

   $posts = \App\Post::all();
   dd($posts);

});

Route::get('/find/{id}', function ($id) {

    $post = \App\Post::find($id);
    dd($post);

});

Route::get('/where/private', function () {

    $posts = \App\Post::where('is_public', 0)->orderBy('id', 'desc')->take(5)->get();
    dd($posts);

});

Route::get('/insert', function () {

    $post = new \App\Post();

    $post->title = 'New ORM post';
    $post->body = 'Eloquent is awesome';

    $result = $post->save();

    dd($result);

});

Route::get('/create', function () {

    $newPost = \App\Post::create([
       'title' => 'Laravel with Eloquent ORM',
       'body' => 'WOWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW'
    ]);

    dd($newPost);

});

Route::get('/update/{id}', function ($id) {

    $result = \App\Post::find($id)->update([
        'title' => 'Updated title for post with id of ' . $id,
        'body' => 'Updated body for post with id of ' . $id
    ]);
    dd($result);

});

Route::get('/delete/{id}', function ($id) {

    $post = \App\Post::find($id);
    $post->delete();

});

Route::get('/deletemany', function () {

    \App\Post::destroy([1, 2, 3]);

});

Route::get('/deletewhere', function () {

    \App\Post::where('is_public', 0)->delete();

});

Route::get('/softdelete/{id}', function ($id) {

    $post = \App\Post::find($id);
    $post->delete();

});

Route::get('/readsoftdelete', function () {

    $trashedPosts = \App\Post::withTrashed()->get();
    dd($trashedPosts);

});

Route::get('/restore/{id}', function ($id) {

    $posts = \App\Post::onlyTrashed()->where('id', $id)->get();
    $posts[0]->restore();

});

Route::get('/forcedelete/{id}', function ($id) {

    $posts = \App\Post::onlyTrashed()->where('id', $id)->get();
    $posts[0]->forceDelete();

});



