<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);

Route::post('/register', [\App\Http\Controllers\UserController::class, 'store']);
