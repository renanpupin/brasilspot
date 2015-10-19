<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class VendedorController extends Controller
{

    public function index()
    {
        $vendedores = \App\Vendedor::all();

    }


    public function create()
    {
        $usuarios = \App\Usuario::all();
        $usuariosSelect = array();

        foreach ($usuarios as $usuario ) {
            $usuariosSelect[$usuario->Id] = $usuario->Nome;
        }

        $tipos = \App\TipoVendedor::all();
        $tiposSelect = array();

        foreach ($tipos as $tipo ) {
            $tiposSelect[$tipo->Id] = $tipo->Tipo;
        }

        $metas = \App\Meta::all();
        $metasSelect = array();

        foreach ($metas as $meta ) {
            $metasSelect[$meta->Id] = $meta->NumeroEmpresas;
        }

        return View('Vendedor.create')
            ->with('usuarios', $usuariosSelect)
            ->with('tipos',$tiposSelect)
            ->with('metas',$metasSelect);

    }


    public function store(Request $request)
    {
        \App\Vendedor::create([
           'IsCoordenador' => $request['isCoordenador'],
           'IdUsuario' => $request['usuarios'],
           'IdTipo' => $request['tipos'],
           'IdMeta' => $request['metas'],
           'IdVendedorPai' => $request['vendedorPai']
        ]);

        return "Vendedor Registrado com sucesso!!";
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
