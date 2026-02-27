<?php

namespace App\Http\Requests;

use App\Models\Livro;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateLivroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // aqui definimos as regras de validação para os campos do formulário
        return [
            'titulo' => ['required', 'string', 'max:255'],
            'autor' => ['required', 'string', 'max:255'],
            'isbn' => ['required', 'string', 'max:20', 'unique:livros,isbn,'.$this->livro->id],
            'tipo' => ['required', Rule::in(Livro::tipos())],
            'preco' => ['required'],
        ];
    }

    public function messages(): array
    {
        // aqui podemos personalizar as mensagens de erro para cada regra de validação
        return [
            'titulo.required' => 'O título é obrigatório.',
            'titulo.string' => 'O título deve ser uma string.',
            'titulo.max' => 'O título não pode ter mais de 255 caracteres.',
            'autor.string' => 'O autor deve ser uma string.',
            'autor.max' => 'O autor não pode ter mais de 255 caracteres.',
            'isbn.required' => 'O ISBN é obrigatório.',
            'isbn.string' => 'O ISBN deve ser uma string.',
            'isbn.max' => 'O ISBN não pode ter mais de 20 caracteres.',
            'isbn.unique' => 'O ISBN já existe. Por favor, insira um ISBN único.',
            'tipo.required' => 'O tipo é obrigatório.',
            'tipo.in' => 'O tipo selecionado não é válido.',
            'preco.required' => 'O preço é obrigatório.',
        ];
    }
}
