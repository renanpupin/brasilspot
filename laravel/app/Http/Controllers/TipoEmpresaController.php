<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\TipoEmpresa;
use Illuminate\Support\Facades\Session;
use Auth;
use App\Http\Controllers\Controller;

class TipoEmpresaController extends Controller
{

    public function index()
    {
        $tiposEmpresas = TipoEmpresa::orderBy('tipo','asc')->paginate(10);
        return view('TipoEmpresa.Index')->with('tiposEmpresas',$tiposEmpresas);
    }


    public function create()
    {
        return view('TipoEmpresa.Create');
    }


    public function store(Request $request)
    {
        $regras = array(
            'tipo' => 'required|string'
        );

        $mensagens = array(
            'required' => 'O campo :attribute deve ser preenchido.',
            'string' => 'O campo :attribute deve ser texto.'
        );

        $this->validate($request,$regras,$mensagens);

        TipoEmpresa::create([
           'tipo' => $request['tipo']
        ]);

        Session::flash('flash_message', 'Tipo Empresa adicionada com sucesso!');

        return redirect()->back();
    }


    public function show($id)
    {
        $tipoEmpresa = TipoEmpresa::find($id);

        return view('TipoEmpresa.Detail')->with('tipoEmpresa',$tipoEmpresa);
    }


    public function edit($id)
    {
        $tipoEmpresa = TipoEmpresa::find($id);

        return view('TipoEmpresa.Edit')->with('tipoEmpresa',$tipoEmpresa);
    }


    public function update(Request $request, $id)
    {
        $tipoEmpresa = TipoEmpresa::find($id);

        $regras = array(
            'tipo' => 'required|string'
        );

        $mensagens = array(
            'required' => 'O campo :attribute deve ser preenchido.',
            'string' => 'O campo :attribute deve ser texto.'
        );

        $this->validate($request, $regras, $mensagens);


        $tipoEmpresa->tipo = $request['tipo'];

        $tipoEmpresa->save();

        Session::flash('flash_message', 'Tipo Empresa alterada com sucesso!');

        return redirect()->back();
    }


    public function destroy($id)
    {
        $tipoEmpresa = TipoEmpresa::find($id);

        if(!empty($tipoEmpresa))
        {

            $tipoEmpresa->delete();
            Session::flash('flash_message', 'Tipo Empresa removida com sucesso!');
            return redirect()->back();
        }

        $this->errorBag('Tipo Empresa não foi encontrado.');
    }
}
