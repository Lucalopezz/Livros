@if ($livro->emprestimos->count())
    <div class="card shadow-sm mt-4">
        <div class="card-body">

            <h5 class="card-title mb-3">
                📋 Histórico de empréstimos
            </h5>

            <div class="list-group">
                @foreach ($livro->emprestimos->sortByDesc('pivot.created_at') as $emprestimo)
                    <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between align-items-start">
                            <div class="flex-grow-1">
                                <h6 class="mb-2">
                                    <strong>{{ $emprestimo->name }}</strong>
                                    @if (!$emprestimo->pivot->data_devolucao)
                                        <span class="badge bg-warning text-dark ms-2">Em andamento</span>
                                    @else
                                        <span class="badge bg-success ms-2">Devolvido</span>
                                    @endif
                                </h6>
                                <p class="mb-1 text-muted">
                                    <small>
                                        <strong>Responsável:</strong> {{ $emprestimo->pivot->name }}<br>
                                        <strong>Data do empréstimo:</strong>
                                        {{ \Carbon\Carbon::parse($emprestimo->pivot->created_at)->format('d/m/Y H:i') }}
                                        @if ($emprestimo->pivot->data_devolucao)
                                            <br><strong>Data da devolução:</strong>
                                            {{ \Carbon\Carbon::parse($emprestimo->pivot->data_devolucao)->format('d/m/Y H:i') }}
                                        @endif
                                    </small>
                                </p>
                            </div>
                            @if (!$emprestimo->pivot->data_devolucao)
                                <div class="ms-3">
                                    <form method="POST" action="{{ url('/devolver/' . $livro->id) }}">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $emprestimo->id }}">
                                        <button type="submit" class="btn btn-sm btn-success">
                                            <i class="fas fa-check"></i> Devolver
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endif
