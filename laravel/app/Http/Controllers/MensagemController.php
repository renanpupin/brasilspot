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

        return view('Mensagem/index')->with('numero_novas_mensagens',$numero_novas_mensagens);
    }
}