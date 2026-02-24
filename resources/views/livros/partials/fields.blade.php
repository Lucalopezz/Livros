<h3>Nome: {{ $livro->titulo ?? 'Título não disponível' }}</h3>
<p>ISBN: {{ $livro->isbn ?? 'ISBN não disponível' }}</p>
@if ($livro && $livro->autor)
    <p>Autor: {{ $livro->autor ?? 'Autor não disponível' }}</p>
@endif
<hr>
<br>