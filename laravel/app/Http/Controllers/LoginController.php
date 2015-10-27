<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('Login.index');
    }

    public function logar(Request $request)
    {

        $regras = array(
            'email' => 'required|string',
            'password' =>'required'
        );

        $mensagens = array(
            'required' => 'O campo :attribute deve ser preenchido.'
        );

        $this->validate($request, $regras, $mensagens);


        $email = $request['email'];
        $senha = $request['password'];

        $condicao = ['email' => $email];
        $usuario = User::where($condicao)->first();

        if(!empty($usuario) && Hash::check($senha,$usuario->password))
        {
            Auth::loginUsingId($usuario->id);

            if($this->authorize('logar',$email,$senha))
            {
                return redirect('Empresa');
            }
        }

        return redirect()->back()->withErrors('Usuário inválido.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->back();
    }

}
