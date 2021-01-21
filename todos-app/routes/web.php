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

// Display form to creating new task
Route::get('/new-todo', [TodosController::class, 'create']);

// Actually save new task to the database
Route::post('/store-todo', [TodosController::class, 'store']);

Route::get('/todos/{todoId}/edit', [TodosController::class, 'edit']);
Route::post('/update-todo', [TodosController::class, 'update']);

