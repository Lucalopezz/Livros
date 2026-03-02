<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">

        <div class="card shadow-sm">
            <div class="card-body">

                <h5 class="card-title mb-4 text-center">
                    📸 Enviar imagem do livro
                </h5>

                <form method="post" enctype="multipart/form-data" action="{{ url('/files') }}">
                    @csrf

                    <input type="hidden" name="livro_id" value="{{ $livro->id }}">

                    <div class="mb-3">
                        <label for="file" class="form-label">
                            Escolha uma imagem
                        </label>
                        <input type="file" name="file" id="file" class="form-control" accept="image/*">
                        <div class="form-text">
                            Formatos aceitos: JPG, PNG, WEBP
                        </div>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">
                            ⬆️ Enviar imagem
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>
