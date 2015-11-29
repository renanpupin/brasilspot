<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Session;
use Input;
use Validator;
use Redirect;
use App\Http\Controllers\Controller;
use App\Salario;
use Auth;

class SalarioController extends Controller
{

    public function consultar()
    {
        $usuario = Auth::user();

        //$salario = Salario::where('idUsuario','=',$usuario->id)->first();

        //$novos_clientes = Empresa::where( DB::raw('MONTH(dataCadastro)'), '=', date('n') )->where('idVendedor','=',$usuario)->count();

        //TODO: arrumar o cálculo disso

        $salario = "150,00";

        return view('Salario.Consultar')->with("salario", $salario);
    }


    public function historico()
    {
        $usuario = Auth::user();

        $salarios = Salario::where('idUsuario','=',$usuario->id)->get();

        return view('Salario.Historico')->with("salarios", $salarios);
    }
}
