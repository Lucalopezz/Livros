<div class="card shadow-sm mt-4">
    <div class="card-body">

        <h5 class="card-title mb-3">
            📝 Registrar empréstimo
        </h5>

        <form method="POST" action="{{ url('/emprestar/' . $livro->id) }}">
            @csrf
            <div class="row g-3 align-items-end">
                <div class="col-md-8">
                    <label for="user_id" class="form-label">ID do Usuário</label>
                    <input type="text" name="user_id" id="user_id" class="form-control"
                        placeholder="Digite o ID do usuário" required>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-info w-100">
                        <i class="fas fa-book-reader"></i> Emprestar
                    </button>
                </div>
            </div>
        </form>

    </div>
</div>
