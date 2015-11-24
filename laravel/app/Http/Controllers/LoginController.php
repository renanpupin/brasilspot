<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Gate;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::Check()) {
            if (Gate::allows('AcessoComerciante')) {
                return redirect('Resumo');
            } else if (Gate::allows('AcessoAdministrador')) {
//                return redirect('Dashboard');
                return Redirect::route('Dashboard');
            } else if (Gate::allows('AcessoVendedor')) {
                return redirect('SeuDesempenho');
            }
            //return redirect()->back()->withErrors('Ocorreu um erro interno, por favor contate um administrador Spot.');
            return redirect('Empresa');
        }
        return view('Login.Index');
    }

    public function logar(Request $request)
    {

        $regras = array(
            'email' => 'required|string',
            'password' => 'required'
        );

        $mensagens = array(
            'required' => 'O campo :attribute deve ser preenchido.'
        );

        $this->validate($request, $regras, $mensagens);


        $email = $request['email'];
        $senha = $request['password'];

        $condicao = ['email' => $email];
        $remember = !empty($request['remember']) ? true : false;

        if (Auth::attempt(['email' => $email, 'password' => $senha], $remember)) {
            if ($this->authorize('logar', $email, $senha)) {
                return Redirect::action('LoginController@index');
            }
        }
//        if(!empty($usuario) && Hash::check($senha,$usuario->password))
//        {
//                Auth::loginUsingId($usuario->id);
//
//            if($this->authorize('logar',$email,$senha))
//            {
//                return redirect('Empresa');
//            }
//        }

        return redirect()->back()->withErrors('Usuário inválido.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->back();
    }

}
