<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = \App\Empresa::all();
        //dd($empresas);
        return view('Empresa.index')->with('empresas',$empresas);
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
        //Transforma lista retorna do banco em um selectList
        foreach($usuarios as $usuario)
        {
            $usuariosSelect[$usuario->Id] = $usuario->Nome;
        }

        $tiposEmpresas = \App\TipoEmpresa::all();
        $tiposEmpresasSelect = array();
        foreach($tiposEmpresas as $tipoEmpresa)
        {
            $tiposEmpresasSelect[$tipoEmpresa->Id] = $tipoEmpresa->Tipo;
        }

        $planos = \App\Plano::all();
        $planosSelect = array();
        foreach($planos as $plano)
        {
            $planosSelect[$plano->Id] = $plano->Nome;
        }

        $vendedores  = \App\Vendedor::all();
        $vendedoresSelect = array();
        //TODO: Refatorar isso depois
        foreach($vendedores as $vendedor)
        {
            $vendedoresSelect[$vendedor->Id] = \App\Usuario::find($vendedor->IdUsuario)->Nome;
        }

        return view('Empresa.Create')
            ->with('usuarios',$usuariosSelect)
            ->with('tiposEmpresas',$tiposEmpresasSelect)
            ->with('planos',$planosSelect)
            ->with('vendedores',$vendedoresSelect);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \App\Empresa::create([
         'NomeEmpreendedor' => $request['nomeEmpreendedor'],
         'RazaoSocial' => $request['razaoSocial'],
         'NomeFantasia' => $request['nomeFantasia'],
         'Slogan' => $request['slogan'],
         'CpfCnpj' => $request['cpfCnpj'],
         'Email' => $request['email'],
         'Descricao' => $request['descricao'],
         'HorarioFuncionamento' => $request['horarioFuncionamento'],
         'AtendeCasa' => $request['atendeCasa'],
         'LinkFacebook' => $request['facebook'],
         'NumeroWhatsapp' => $request['whatsapp'],
         'IdPlano' => $request['planos'],
         'IdUsuario' => $request['usuarios'],
         'IdTipoEmpresa' => $request['tiposEmpresas'],
         'IdVendedor' => $request['vendedores'],
         'IdPlano' => $request['planos'],
         'DataCadastro' => '2015-10-11',
         'DataVencimentoPlano' => '2016-10-11']);

        return "Empresa Registrada!!";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresa = \App\Empresa::find($id);

        return view('Empresa.index',compact('empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
