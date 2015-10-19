<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Empresa;
use App\Usuario;
use App\TipoEmpresa;
use App\Plano;
use App\Vendedor;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

class EmpresaController extends Controller
{

    public function index()
    {
        $empresas = Empresa::all();

        return view('Empresa.Index')->with('empresas',$empresas);
    }


    public function create()
    {
        $usuarios = Usuario::lists('nome','id');

        $tiposEmpresas = TipoEmpresa::lists('tipo','id');

        $planos = Plano::lists('nome','id');

        $vendedores  = Vendedor::all();
        $vendedoresSelect = array();
        //TODO: Refatorar isso depois
        foreach($vendedores as $vendedor)
        {
            $vendedoresSelect[$vendedor->id] = Usuario::find($vendedor->idUsuario)->nome;
        }

        return view('Empresa.Create')
            ->with('usuarios',$usuarios)
            ->with('tiposEmpresas',$tiposEmpresas)
            ->with('planos',$planos)
            ->with('vendedores',$vendedoresSelect);
    }

    public function store(Request $request)
    {
        $regras = array(
            'nomeEmpreendedor' => 'required|string',
            'razaoSocial' => 'string',
            'nomeFantasia' => 'required|string',
            'slogan' => 'string',
            'cpfCnpj' => 'required|string',
            'email' => 'required|string',
            'descricao' => 'required|string',
            'horarioFuncionamento' => 'required|string',
            'linkFacebook' => 'string',
            'numeroWhatsapp' => 'string',
            'idPlano' => 'required',
            'idUsuario' => 'required',
            'idTipoEmpresa' => 'required',
            'idVendedor' => 'required',
            'idPlano' => 'required'
        );

        $mensagens = array(
            'required' => 'O campo :attribute deve ser preenchido.',
            'string' => 'O campo :attribute deve ser texto.'
        );

        $this->validate($request,$regras,$mensagens);

        Empresa::create([
         'nomeEmpreendedor' => $request['nomeEmpreendedor'],
         'razaoSocial' => $request['razaoSocial'],
         'nomeFantasia' => $request['nomeFantasia'],
         'slogan' => $request['slogan'],
         'cpfCnpj' => $request['cpfCnpj'],
         'email' => $request['email'],
         'descricao' => $request['descricao'],
         'horarioFuncionamento' => $request['horarioFuncionamento'],
         'atendeCasa' => $request['atendeCasa'],
         'linkFacebook' => $request['facebook'],
         'numeroWhatsapp' => $request['whatsapp'],
         'idUsuario' => $request['usuarios'],
         'idTipoEmpresa' => $request['tiposEmpresas'],
         'idVendedor' => $request['vendedores'],
         'idPlano' => $request['planos'],
         'dataCadastro' => '2015-10-11',
         'dataVencimentoPlano' => '2016-10-11']);

         Session::flash('flash_message', 'Empresa adicionada com sucesso!');

         return redirect()->back();
    }


    public function show($id)
    {
        $empresa = Empresa::find($id);

        return view('Empresa.Detail')->with('empresa',$empresa);
    }

    public function edit($id)
    {
        $empresa = Empresa::find($id);

        return view('Empresa.Edit')->with('empresa',$empresa);
    }


    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {

    }
}
