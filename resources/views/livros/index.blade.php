@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h1>Busca de livros:</h1>

        <form method="get" action="{{ url('/livros') }}">
            <div class="row">
                <div class=" col-sm input-group">
                    <input type="text" class="form-control" name="search" value="{{ request()->search }}">

                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-success"> Buscar </button>
                    </span>

                </div>
            </div>
        </form>
        <br />
        <hr />
        <h1>Listagem de livros:</h1>
        <br>
        @forelse ($livros as $livro)
            @include('livros.partials.fields')
        @empty
            <h1>Não há livros cadastrados.</h1>
        @endforelse

        {{ $livros->appends(request()->query())->links() }}
    </div>
@endsection
