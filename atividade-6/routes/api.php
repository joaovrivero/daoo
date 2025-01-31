<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProdutoController;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\FornecedorController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\LoginController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('produtos', ProdutoController::class);
    Route::apiResource('users', UserController::class);
    Route::apiResource('categorias', CategoriaController::class)
        ->except(['index', 'show'])
        ->parameters(['categorias' => 'categoria']);
    Route::apiResource('fornecedores', FornecedorController::class)
        ->except(['index', 'show'])
        ->parameters(['fornecedores' => 'fornecedor']);
});

Route::apiResource('produtos', ProdutoController::class)->only(['index', 'show']);
Route::apiResource('users', UserController::class)->only(['store']);
Route::apiResource('categorias', CategoriaController::class)
    ->only(['index', 'show'])
    ->parameters(['categorias' => 'categoria']);
Route::apiResource('fornecedores', FornecedorController::class)
    ->only(['index', 'show'])
    ->parameters(['fornecedores' => 'fornecedor']);

Route::controller(LoginController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('logout', 'logout')->middleware('auth:sanctum');
});