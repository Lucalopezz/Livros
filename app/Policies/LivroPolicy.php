<?php

namespace App\Policies;

use App\Models\Livro;
use App\Models\User;

class LivroPolicy
{
    /**
     * Listar livros (público)
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }

    /**
     * Ver um livro (público)
     */
    public function view(?User $user, Livro $livro): bool
    {
        return true;
    }

    /**
     * Criar livro (usuário logado)
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Editar livro
     * - dono OU admin
     */
    public function update(User $user, Livro $livro): bool
    {
        return $user->id === $livro->user_id || $user->can('admin');
    }

    /**
     * Excluir livro (admin)
     */
    public function delete(User $user, Livro $livro): bool
    {
        return $user->can('admin');
    }

    /**
     * Emprestar livro
     */
    public function emprestar(User $user, Livro $livro): bool
    {
        return true;
    }

    /**
     * Devolver livro
     */
    public function devolver(User $user, Livro $livro): bool
    {
        return true;
    }
}
