<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    /** @use HasFactory<\Database\Factories\LivroFactory> */
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    protected $table = 'livros';

    // campos que podem ser preenchidos em massa
    protected $fillable = [
        'titulo',
        'autor',
        'isbn',
        'user_id',
    ];

    // campos que não podem ser preenchidos em massa
    protected $guarded = [
        'id',
    ];

    // tipagem dos campos que não são string
    protected $casts = [
        'id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public static function tipos(): array
    {
        return [
            'Nacional',
            'Internacional',
        ];
    }
}
