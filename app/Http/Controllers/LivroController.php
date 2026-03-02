<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLivroRequest;
use App\Http\Requests\UpdateLivroRequest;
use App\Models\Livro;
use App\Models\User;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function __construct()
    {
        // Usuário autenticado
        $this->middleware('can:user')->only([
            'create', 'store', 'edit', 'update', 'emprestar', 'devolver',
        ]);

        // Apenas admin
        $this->middleware('can:admin')->only([
            'destroy',
        ]);
    }

    /**
     * Lista de livros (público)
     */
    public function index(Request $request)
    {
        $livros = Livro::when($request->search, function ($query, $search) {
            $query->where('autor', 'LIKE', "%{$search}%")
                ->orWhere('titulo', 'LIKE', "%{$search}%");
        })
            ->paginate(5);

        return view('livros.index', compact('livros'));
    }

    /**
     * Formulário de criação
     */
    public function create()
    {
        $this->authorize('create', Livro::class);

        return view('livros.create', [
            'livro' => new Livro,
        ]);
    }

    /**
     * Salva novo livro
     */
    public function store(StoreLivroRequest $request)
    {
        $this->authorize('create', Livro::class);

        $validated = $request->validated();
        $validated['user_id'] = auth()->id();

        $livro = Livro::create($validated);

        session()->flash('alert-info', 'Livro criado com sucesso!');

        return redirect("/livros/{$livro->id}");
    }

    /**
     * Exibe um livro (público)
     */
    public function show(Livro $livro)
    {
        return view('livros.show', compact('livro'));
    }

    /**
     * Formulário de edição
     */
    public function edit(Livro $livro)
    {
        $this->authorize('update', $livro);

        return view('livros.edit', compact('livro'));
    }

    /**
     * Atualiza o livro
     */
    public function update(UpdateLivroRequest $request, Livro $livro)
    {
        $this->authorize('update', $livro);

        $livro->update($request->validated());

        session()->flash('alert-info', 'Livro atualizado com sucesso!');

        return redirect("/livros/{$livro->id}");
    }

    /**
     * Remove o livro
     */
    public function destroy(Livro $livro)
    {
        $this->authorize('delete', $livro);

        $livro->delete();

        return redirect('/livros');
    }

    /**
     * Emprestar livro
     */
    public function emprestar(Request $request, Livro $livro)
    {
        $this->authorize('emprestar', $livro);

        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $user = User::find($request->user_id);

        $livro->emprestimos()->attach($user);

        return redirect("/livros/{$livro->id}");
    }

    /**
     * Devolver livro
     */
    public function devolver(Request $request, Livro $livro)
    {
        $this->authorize('devolver', $livro);

        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $livro->emprestimos()
            ->wherePivot('data_devolucao', null)
            ->updateExistingPivot($request->user_id, [
                'data_devolucao' => now(),
            ]);

        return redirect("/livros/{$livro->id}");
    }
}
