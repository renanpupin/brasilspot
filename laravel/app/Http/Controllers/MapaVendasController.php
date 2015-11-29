<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Validator;
use Redirect;
use Auth;
use App\Empresa;

class MapaVendasController extends Controller
{

    public function mapa()
    {
        $empresas = Empresa::select(array('id', 'nomeFantasia'))->get();
        $markers = '[{"id":1, "nome": "Pizzaria 1", "endereco": "Avenida Paulista, 151 - São Paulo - SP", "lat": "-23", "lon": "-51"}]';
        return view('Mapa/mapa')->with('markers',$markers);
    }
}
