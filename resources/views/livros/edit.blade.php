@extends('layouts.app')

@section('content')
    <h1>Edição de um livro:</h1>
    <br>
    <form method="POST" action="{{ url('/livros/' . $livro->id) }}">
        @csrf
        @method('PATCH')
        @include('livros.partials.form')
    </form>
@endsection
