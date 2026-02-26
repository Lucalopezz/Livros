<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Socialite;

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

    public function handleProviderCallback()
    {
        $userSenhaUnica = Socialite::driver('senhaunica')->user();
        $user = User::where('codpes', $userSenhaUnica->codpes)->first();

        if (is_null($user)) {
            $user = new User;
        }
        $user->name = $userSenhaUnica->nompes;
        $user->email = $userSenhaUnica->email;
        $user->codpes = $userSenhaUnica->codpes;
        $user->save();
        Auth::login($user, true);

        return redirect('/');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('senhaunica')->redirect();
    }
}
