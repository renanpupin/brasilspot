<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Validator;
use Redirect;
use Auth;

class ContatoController extends Controller
{

    public function index()
    {
        return view('contato');
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $regras = array(
            'nome' => 'required|string',
            'email' => 'required|string',
            'mensagem' => 'required|string'
        );

        $mensagens = array(
            'nome.required' => 'O campo Nome deve ser preenchido.',
            'email.required' => 'O campo Email deve ser preenchido.',
            'mensagem.required' => 'O campo Mensagem deve ser preenchido.'
        );

        $validator = Validator::make($request->all(), $regras, $mensagens);

        if ($validator->fails()) {
            return redirect('Contato')
                ->withErrors($validator)
                ->withInput();
        }

//        Mail::send('Usuario.EmailTemplate', ['email' => $usuario->email, 'password' => $senha], function ($message) use ($usuario) {
//            $message->to($usuario->email, $usuario->name)->subject('BrasilSpot Login');
//        });


    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
