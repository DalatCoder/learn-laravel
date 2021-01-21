<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\TodosController;

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
    return redirect('/todos');
});

Route::get('/todos', [TodosController::class, 'index']);
Route::get('/todos/{todoId}', [TodosController::class, 'show']);
