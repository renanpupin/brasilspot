<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class VendedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendedores = \App\Vendedor::all();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
