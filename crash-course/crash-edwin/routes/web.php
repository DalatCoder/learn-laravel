<?php

use App\Models\Post;
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

/*
Route::get('/update', function (){
    return DB::update('update posts set title = ? where id = 1', ['Updated title']);
});
*/

/*
Route::get('/delete', function (){
   return DB::delete('delete from posts where id = ?', [1]);
});
*/

/*
|--------------------------------------------------------------------------
| ELOQUENT
|--------------------------------------------------------------------------
*/
/*
Route::get('/read', function () {
    $posts = Post::all();
    foreach ($posts as $post) {
        var_dump($post->title);
    }
});

Route::get('/find', function () {
    $post = Post::find(2);
    return $post;
});

*/

/*
Route::get('/findmore', function () {
//    $post = Post::findOrFail(2);
//    return $post;

    $posts = Post::where('is_admin', '0')->get();
    return $posts;
});

Route::get('/basicinsert', function () {
   $post = new Post();
   $post->title = 'New post';
   $post->body = 'New body';

   $post->save();
});
*/

Route::get()





