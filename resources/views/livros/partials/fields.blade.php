<div class="card shadow-sm">
    <div class="card-body">

        <h3 class="card-title mb-3">
            <a href="{{ url('/livros/' . $livro->id) }}" class="text-decoration-none">
                {{ $livro->titulo ?? 'Título não disponível' }}
            </a>
        </h3>

        <p class="card-text mb-1">
            <strong>ISBN:</strong> {{ $livro->isbn ?? 'ISBN não disponível' }}
        </p>

        @if ($livro && $livro->autor)
            <p class="card-text mb-1">
                <strong>Autor:</strong> {{ $livro->autor }}
            </p>
        @endif

        <p class="card-text text-muted mt-2">
            Cadastrado por: {{ $livro->user->name ?? 'Anônimo' }}
        </p>

        <div class="d-flex gap-2 mt-4">
            <a href="{{ url('/livros/' . $livro->id . '/edit') }}" class="btn btn-outline-primary btn-sm">
                ✏️ Editar
            </a>

            <form action="{{ url('/livros/' . $livro->id) }}" method="post" onsubmit="return confirm('Tem certeza?');">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-outline-danger btn-sm">
                    🗑️ Apagar
                </button>
            </form>
        </div>

    </div>
</div>
