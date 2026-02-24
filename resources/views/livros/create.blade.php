@extends('layouts.app')

@section('content')
    <h1>Criação de um livro:</h1>
    <br>
    <form method="POST" action="{{ url('/livros') }}">
        @csrf
        @include('livros.partials.form')
    </form>
@endsection
