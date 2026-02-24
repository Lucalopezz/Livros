@extends('layouts.app')

@section('content')
    @forelse ($livros as $livro)
        @include('livros.partials.fields')
    @empty
        <h1>Não há livros cadastrados.</h1>
    @endforelse
@endsection
