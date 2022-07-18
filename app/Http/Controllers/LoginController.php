<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' =>  'required',
            'password' => 'required'
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            return redirect()->route('account.index')->with('message', 'Acesso realizado com sucesso');
        }

        return redirect()->back()->with('danger', 'Email ou senha invalido!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('users.login')->with('danger', 'Sessao encerrada com sucesso.');;
    }
}
