Título: <input type="text" name="titulo" value="{{ old('titulo', $livro->titulo) }}">
Autor: <input type="text" name="autor" value="{{ old('autor', $livro->autor) }}">
ISBN: <input type="text" class="isbn" name="isbn" value="{{ old('isbn', $livro->isbn) }}">
<button type="submit">Enviar</button>