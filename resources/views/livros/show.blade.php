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

                @if ($livro->files->count())
                    <div class="card shadow-sm mt-4">
                        <div class="card-body">

                            <h5 class="card-title mb-3">
                                🖼️ Galeria de imagens
                            </h5>

                            <div class="row g-3">
                                @foreach ($livro->files as $file)
                                    <div class="col-6 col-md-4 col-lg-3">
                                        <div class="card h-100 shadow-sm">
                                            <img  src="{{ route('files.show', $file) }}" class="card-img-top img-fluid rounded"
                                                alt="Imagem do livro" style="object-fit: cover; height: 180px;">
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                @endif

            </div>
        </div>

    </div>
@endsection
