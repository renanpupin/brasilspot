<?php

namespace App\Http\Controllers;

use App\Assinatura;
use App\AssinaturaComerciante;
use App\Comerciante;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use DB;

class ComercianteController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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

    public function minhasAssinaturas()
    {
        $usuario = Auth::user();
        $comerciante = Comerciante::where('idUsuario','=',$usuario->id)->first();
        $query =  DB::select(DB::raw("select count(idComerciante) as qtdAssinaturasTotais from assinaturasComerciantes ac inner join assinaturas a on a.id = ac.idAssinatura  where idComerciante = :comercianteId  group by idComerciante"),['comercianteId' => $comerciante->id]);
        $qtdAssinaturasTotais = $query[0]->qtdAssinaturasTotais;

        $assinaturasComerciantes = AssinaturaComerciante::where('idComerciante','=',$comerciante->id)->with('Assinatura')->with('Assinatura.Plano')->get();

        return view('Comerciante.Assinatura')->with('qtdAssinaturas',$qtdAssinaturasTotais)->with('assinaturasComerciante',$assinaturasComerciantes);

    }
}
