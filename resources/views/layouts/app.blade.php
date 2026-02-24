@extends('laravel-usp-theme::master')

@section('javascripts_bottom')
    @parent
    <script type="text/javascript" src="{ { asset('js/livro.js') } }"></script>
@endsection
