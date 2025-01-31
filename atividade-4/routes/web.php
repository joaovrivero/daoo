<?php

use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\FornecedorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('produtos', ProdutoController::class);

Route::resource('categorias', CategoriaController::class);

Route::resource('fornecedores', FornecedorController::class);

Route::get('/categorias/{id}', [CategoriaController::class, 'show'])->name('categorias.show');

Route::get('/fornecedores/{id}', [FornecedorController::class, 'show'])->name('fornecedor.show');

Route::get('/produtos/{id}', [ProdutoController::class, 'show'])->name('produtos.show');

Route::get('/', function () {return view('welcome');})->name('home');