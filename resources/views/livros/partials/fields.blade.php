<h1>Nome: {{ $livro->titulo ?? 'Título não disponível' }}</h1>
<h2>ISBN: {{ $livro->isbn ?? 'ISBN não disponível' }}</h2>
@if ($livro && $livro->autor)
    <h3>Autor: {{ $livro->autor ?? 'Autor não disponível' }}</h3>
@endif