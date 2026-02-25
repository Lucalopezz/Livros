<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function username()
    {
        return 'codpes';
    }

    public function logout()
    {
        // auth()->logout(); a intelicence não reconhece o auth() aqui, por isso usei o Auth::logout()
        Auth::logout();

        return redirect('/');
    }
}
