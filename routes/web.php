<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LivroController;
use Illuminate\Support\Facades\Route;

Route::resource('livros', LivroController::class);

Route::get('/', [IndexController::class, 'index']);


Route::resource('files', FileController::class);