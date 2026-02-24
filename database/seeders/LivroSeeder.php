<?php

namespace Database\Seeders;

use App\Models\Livro;
use Illuminate\Database\Seeder;

class LivroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $livro = [
            'titulo' => 'Quincas Borba',
            'autor' => 'Machado de Assis',
            'isbn' => '9780195106817',
        ];
        Livro::create($livro);
        Livro::factory()->count(10)->create();
        // para rodar o seeder: php artisan db:seed --class=LivroSeeder
    }
}
