<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Empresa;
use App\User;
use App\TipoEmpresa;
use App\Plano;
use App\Vendedor;
use Illuminate\Support\Facades\Session;
use Input;
use Validator;
use Redirect;
use Gate;
use Auth;
use App\Http\Controllers\Controller;

class EmpresaController extends Controller
{

    public function index()
    {
        if(Gate::allows('AcessoComerciante'))
        {
            $usuario = Auth::User();
            $empresa = $usuario->Empresa()->first();
            $empresa = $empresa->with('Plano')->with('TipoEmpresa');

            return view('Empresa.Index')->with('empresas',$empresa);
        }

        $empresas = Empresa::with('Plano')->with('TipoEmpresa')->get();

        return view('Empresa.Index')->with('empresas',$empresas);
    }


    public function create()
    {
        $usuarios = User::lists('name','id');

        $tiposEmpresas = TipoEmpresa::lists('tipo','id');

        $planos = Plano::lists('nome','id');

        $vendedores  = Vendedor::all();
        $vendedoresSelect = array();
        //TODO: Refatorar isso depois
        foreach($vendedores as $vendedor)
        {
            $vendedoresSelect[$vendedor->id] = $vendedor->Usuario()->name;
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

    public function upload() {
        // captura todos os arquivos do post
        $file = array('image' => Input::file('image'));
        // configura regras de upload
        $rules = array('image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
        //configura validator
        $validator = Validator::make($file, $rules);
        if ($validator->fails()) {
            // redireciona para upload com mensagem de erro
            return Redirect::to('upload')->withInput()->withErrors($validator);
        }
        else {
            // checking file is valid.
            if (Input::file('image')->isValid()) {
                $destinationPath = 'uploads'; //nome da pasta
                $extension = Input::file('image')->getClientOriginalExtension(); // captura extensao da imagem
                $fileName = rand(1,99999).'.'.$extension; // renomeia
                Input::file('image')->move($destinationPath, $fileName); // faz upload do arquivo para a pasta
                // envia mensagem de volta de sucesso
                Session::flash('success', 'Upload concluido com sucesso.');
                return Redirect::to('upload');
            }
            else {
                // envia mensagem com erros
                Session::flash('error', 'Arquivo de upload inválido.');
                return Redirect::to('upload');
            }
        }
    }

    public function destroy($id)
    {

    }

    public function visualizar()
    {
        $empresas = Empresa::all();

        return view('VisualizarEmpresa')->with('empresas',$empresas);
    }
}
