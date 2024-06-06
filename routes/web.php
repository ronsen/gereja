<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect('/admin'))->name('home');
Route::get('/login', fn () => redirect('/admin'))->name('login');