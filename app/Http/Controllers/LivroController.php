<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLivroRequest;
use App\Http\Requests\UpdateLivroRequest;
use App\Models\Livro;
use App\Models\User;
use Symfony\Component\HttpFoundation\Request;

class LivroController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:user')->only([
            'create', 'store', 'edit', 'update',
        ]);

        $this->middleware('can:admin')->only([
            'destroy',
        ]);
    }

    public function index(Request $request)
    {
        if (isset($request->search)) {
            $livros = Livro::where('autor', 'LIKE', "%{$request->search}%")
                ->orWhere('titulo', 'LIKE', "%{$request->search}%")->paginate(5);
        } else {
            $livros = Livro::paginate(5);
        }

        return view('livros.index', ['livros' => $livros]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        // Objeto vazio para preencher o formulário reusável
        return view('livros.create', ['livro' => new Livro]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLivroRequest $request)
    {

        $validated = $request->validated(); // aqui o Laravel já valida os dados, se não passar, ele redireciona de volta com os erros
        $validated['user_id'] = auth()->user()->id;
        // usando o método create do Eloquent, que preenche os campos em massa
        $livro = Livro::create($validated);
        // alert-info é a msg azul e alert-danger é a msg vermelha
        request()->session()->flash('alert-info', 'Livro criado com sucesso!');

        return redirect("/livros/{$livro->id}");
    }

    /**
     * Display the specified resource.
     */
    public function show(Livro $livro)
    {
        // nem precisa buscar o livro, o Laravel já faz isso automaticamente
        return view('livros.show', [
            'livro' => $livro,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Livro $livro)
    {

        return view('livros.edit', ['livro' => $livro]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLivroRequest $request, Livro $livro)
    {

        $validated = $request->validated(); // aqui o Laravel já valida os dados, se não passar, ele redireciona de volta com os erros
        $livro->update($validated);

        request()->session()->flash('alert-info', 'Livro atualizado com sucesso!');

        return redirect("/livros/{$livro->id}");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Livro $livro)
    {
        $this->verifyUserPermission('admin');
        $livro->delete();

        return redirect('/livros');
    }

    public function emprestar(Request $request, Livro $livro)
    {
        $user = User::find($request->user_id);
        $livro->emprestimos()->attach($user);

        return redirect('/livros/'.$livro->id);
    }

    public function devolver(Request $request, Livro $livro)
    {
        // não quero fazer detach...
        $livro->emprestimos()->wherePivot('data_devolucao', null)->updateExistingPivot($request->user_id, [
            'data_devolucao' => \Carbon\Carbon::now()->toDateTimeString(),
        ]);

        return redirect('/livros/'.$livro->id);
    }
}
