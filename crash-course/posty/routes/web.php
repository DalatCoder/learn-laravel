<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', ['App\Http\Controllers\DashboardController', 'index'])->name('dashboard');

Route::get('/register', ['App\Http\Controllers\Auth\RegisterController', 'index'])->name('register');
Route::post('/register', ['App\Http\Controllers\Auth\RegisterController', 'store']);

Route::get('/posts', function () {
    return view('posts.index');
});
