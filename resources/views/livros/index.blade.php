@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h1>Listagem de livros:</h1>
        <br>
        @forelse ($livros as $livro)
            @include('livros.partials.fields')
        @empty
            <h1>Não há livros cadastrados.</h1>
        @endforelse
    </div>
@endsection
