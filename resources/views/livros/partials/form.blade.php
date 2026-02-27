<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-body">

            <h4 class="card-title mb-4">📚 Cadastro de Livro</h4>

            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" id="titulo" name="titulo" class="form-control"
                    value="{{ old('titulo', $livro->titulo) }}" placeholder="Digite o título do livro">
            </div>

            <div class="mb-3">
                <label for="autor" class="form-label">Autor</label>
                <input type="text" id="autor" name="autor" class="form-control"
                    value="{{ old('autor', $livro->autor) }}" placeholder="Nome do autor">
            </div>

            <div class="mb-3">
                <label for="isbn" class="form-label">ISBN</label>
                <input type="text" id="isbn" name="isbn" class="form-control isbn"
                    value="{{ old('isbn', $livro->isbn) }}" placeholder="Ex: 978-85-00000-00-0">
            </div>

            <div class="mb-4">
                <label for="tipo" class="form-label">Tipo</label>
                <select name="tipo" id="tipo" class="form-select">
                    <option value="">— Selecione —</option>

                    @foreach ($livro::tipos() as $tipo)
                        <option value="{{ $tipo }}" {{ old('tipo', $livro->tipo) == $tipo ? 'selected' : '' }}>
                            {{ $tipo }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary px-4">
                    💾 Enviar
                </button>
            </div>

        </div>
    </div>
</div>
