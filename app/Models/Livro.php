<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $table = 'livros';

    // campos que podem ser preenchidos em massa
    protected $fillable = [
        'titulo',
        'autor',
        'isbn',
    ];
    // tipagem dos campos que não são string
    protected $casts = [
        'id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
