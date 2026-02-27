@extends('layouts.app')

@section('content')
    <h1>Criação de um livro:</h1>
    <br>
    @can('user')
        <form method="POST" action="{{ url('/livros') }}">
        @csrf
        @include('livros.partials.form')
    </form>
    @endcan
    
@endsection
