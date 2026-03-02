@if ($livro->files->count())
    <div class="card shadow-sm mt-4">
        <div class="card-body">

            <h5 class="card-title mb-3">
                🖼️ Galeria de imagens
            </h5>

            <div class="row g-3">
                @foreach ($livro->files as $file)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="card h-100 shadow-sm">
                            <img src="{{ route('files.show', $file) }}"
                                class="card-img-top img-fluid rounded" alt="Imagem do livro"
                                style="object-fit: cover; height: 180px;">
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endif
