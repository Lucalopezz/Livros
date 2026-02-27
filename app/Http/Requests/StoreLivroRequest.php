<?php

namespace App\Http\Requests;

use App\Models\Livro;
use Illuminate\Foundation\Http\FormRequest;

class StoreLivroRequest extends FormRequest
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
            'autor' => ['nullable', 'string', 'max:255'],
            'isbn' => ['required', 'string', 'max:20', 'unique:livros,isbn'],
            'tipo' => ['nullable', 'string', 'in:'.implode(',', Livro::tipos())],
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
            'tipo.in' => 'O tipo selecionado não é válido.',
        ];
    }

    protected function prepareForValidation()
    {
        // aqui podemos manipular os dados antes de serem validados, por exemplo, para remover espaços extras
        $this->merge([
            'titulo' => trim($this->titulo),
            'autor' => trim($this->autor),
            'isbn' => trim($this->isbn),
            'isbn' => preg_replace('/[^0-9]/', '', $this->isbn),
        ]);
    }
}
