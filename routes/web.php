<?php

use App\Http\Controllers\LivroController;
use Illuminate\Support\Facades\Route;

Route::resource('livros', LivroController::class);
