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

Route::get('/insert', function () {

    DB::insert('INSERT INTO posts(title, body) VALUES (?, ?)', [
        'PHP with Laravel',
        'Laravel is so awesome!'
    ]);

});

Route::get('/read', function () {

    $results = DB::select('SELECT * FROM posts');
    dd($results);

});

Route::get('/update', function () {

    $numberOfRowsEffected = DB::update("UPDATE posts SET title = 'Updated title', body = 'Updated body' WHERE id = ?", [
        1
    ]);
    dd($numberOfRowsEffected);

});

Route::get('/delete', function () {

    $numberOfRowsEffected = DB::delete('DELETE FROM posts WHERE id = ?', [
        1
    ]);
    dd($numberOfRowsEffected);

});

