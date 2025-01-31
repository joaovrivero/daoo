<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('activities', ActivityController::class);
Route::resource('users', UserController::class);
Route::resource('messages', MessageController::class);
