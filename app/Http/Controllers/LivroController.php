<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function index()
    {
        return view('livros.index');
    }
    public function show($isbn)
    {
        if ($isbn === '1234567890') {
            $livro = 'Livro encontrado: "O Senhor dos Anéis"';
        } else {
            $livro = "Livro não encontrado";
        }

        return view('livros.show', ['livro' => $livro]);
    }
}
