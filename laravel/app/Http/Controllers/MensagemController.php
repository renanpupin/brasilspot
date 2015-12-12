<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Validator;
use Redirect;
use Auth;
use App\Mensagem;

class MensagemController extends Controller
{

    public function index()
    {
        $usuario = Auth::User();
        $numero_novas_mensagens = Mensagem::where('dataRespondida','!=', '')->where('idUsuario', '=', $usuario)->count();
        $mensagens = Mensagem::where('idUsuario', '=', $usuario)->get();
        return view('Mensagem/Index')->with('numero_novas_mensagens',$numero_novas_mensagens)->with('mensagens',$mensagens);
    }

    public function responder($id)
    {
        $mensagem = Mensagem::with('UsuarioDestino','Usuario')->find($id);
        return view('Mensagem.Responder')->with('mensagem',$mensagem);
    }

    public function enviar($request)
    {

    }
}