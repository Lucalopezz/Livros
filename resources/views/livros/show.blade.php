@extends('layouts.app')

@section('content')
    <div class="container my-5">

        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card shadow-sm mb-4">
                    <div class="card-body">

                        <h3 class="card-title mb-3">
                            📘 Detalhes do livro
                        </h3>

                        @include('livros.partials.fields')

                    </div>
                </div>

                <div class="card shadow-sm">
                    <div class="card-body">

                        <h5 class="card-title mb-3">
                            📸 Imagens do livro
                        </h5>

                        @include('files.partials.form')

                    </div>
                </div>

                @include('livros.partials.galeria')

                @include('livros.partials.emprestimo-form')

                @include('livros.partials.emprestimos-lista')

            </div>

        </div>

    </div>
@endsection
