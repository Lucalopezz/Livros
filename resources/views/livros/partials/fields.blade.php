<h3><a href="{{ url('/livros/' . $livro->id) }}">{{ $livro->titulo ?? 'Título não disponível' }}</a></h3>
<p>ISBN: {{ $livro->isbn ?? 'ISBN não disponível' }}</p>
@if ($livro && $livro->autor)
    <p>Autor: {{ $livro->autor ?? 'Autor não disponível' }}</p>
@endif
<ul>
    <li><a href="{{ url('/livros/' . $livro->id . '/edit') }}">Editar</a></li>
    <li>
        <form action="{{ url('/livros/' . $livro->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Tem certeza?');">Apagar</button>
        </form>
    </li>
</ul>
<hr>
<br>
