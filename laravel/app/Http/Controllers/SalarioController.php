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

class SalarioController extends Controller
{

    public function consultar()
    {
        return view('Salario.Consultar');
    }


    public function historico()
    {
        return view('Salario.Historico');
    }
}
