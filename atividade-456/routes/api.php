<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ActivityController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\LoginController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('activities', ActivityController::class)->middleware('auth:sanctum');
Route::apiResource('messages', UserController::class)->middleware('auth:sanctum');

Route::apiResource('activities', ActivityController::class);
Route::apiResource('messages', MessageController::class);
Route::apiResource('users', UserController::class);

Route::post('/login', [LoginController::class, 'login'])->name('login');