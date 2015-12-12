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
use App\Filial;
use App\Endereco;

class MapaVendasController extends Controller
{

    public function mapa()
    {
        $markers = '[';
        $empresas = Empresa::select(array('id', 'nomeFantasia'))->get();
        foreach($empresas as $empresa){
            $filiais = Filial::select(array('id', 'idEmpresa', 'idEndereco'))->where('idEmpresa', '=', $empresa->id)->get();
            foreach($filiais as $filial) {
                $endereco = Endereco::select(array('id', 'endereco', 'bairro', 'cidade', 'estado', 'lat', 'lon'))->where('id', '=', $filial->idEndereco)->first();
                $markers .= '{"id": '.$empresa->id.', "nome": "'.$empresa->nomeFantasia.'", "endereco": "'.$endereco->endereco.', '.$endereco->bairro.', '.$endereco->cidade.' - '.$endereco->estado.'", "lat": "'.$endereco->lat.'", "lon": "'.$endereco->lon.'"},';
            }

        }
        $markers .= ']';
        //$markers = '[{"id":1, "nome": "Pizzaria 1", "endereco": "Avenida Paulista, 151 - São Paulo - SP", "lat": "-23", "lon": "-51"}]';


//        dd($markers);
        return view('Mapa/mapa')->with('markers',$markers);
    }
}
