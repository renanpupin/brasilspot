<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Empresa;
use App\User;
use App\TipoEmpresa;
use App\Plano;
use App\Vendedor;
use App\Categoria;
use App\Cartao;
use Illuminate\Support\Facades\Session;
use Input;
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
            if(!empty($empresa))
            {
                $empresa = $empresa->with('Plano')->with('TipoEmpresa');
                return view('Empresa.Index')->with('empresas',$empresa);
            }
            $empresa = array();
            return view('Empresa.Index')->with('empresas',$empresa);
        }

        $empresas = Empresa::with('Plano')->with('TipoEmpresa')->get();

        return view('Empresa.Index')->with('empresas',$empresas);
    }


    public function create()
    {
        $usuarios = User::orderBy('name','asc')->lists('name','id');
        $tiposEmpresas = TipoEmpresa::orderBy('tipo','asc')->lists('tipo','id');
        $planos = Plano::orderBy('nome','asc')->lists('nome','id');
        $categorias = Categoria::orderBy('nome','asc')->lists('nome','id');
        $cartoes = Cartao::orderBy('tipo','asc')->lists('bandeira','id');
        $vendedores  = Vendedor::with('Usuario')->get()->lists('Usuario.name','id');

        return view('Empresa.Create')
            ->with('usuarios',$usuarios)
            ->with('tiposEmpresas',$tiposEmpresas)
            ->with('planos',$planos)
            ->with('cartoes',$cartoes)
            ->with('categorias',$categorias)
            ->with('vendedores',$vendedores);
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
            'tiposEmpreendimentos' => 'required',
        );

        $mensagens = array(
            'required' => 'O campo :attribute deve ser preenchido.',
            'string' => 'O campo :attribute deve ser texto.'
        );
        $validator = Validator::make($request->all(),$regras,$mensagens);

        if(Gate::allows('AcessoComerciante'))
        {
            $usuario = Auth::user();
            $planoUsuario = $usuario->PlanoUsuario->with('Plano')->first();
            $plano = $planoUsuario->Plano->nome;

            if(!empty($plano))
            {
                if( $plano == 'Básico')
                {
                    $tags = explode(',',$request['tags']);
                    if(count($tags) <= 5)
                    {

                    }
                    else
                    {
                        $errors = $validator->getMessageBag();
                        $errors->add('ErroTags','Seu plano não permite mais de 5 tags.');

                        return redirect()->back()->with('errors',$errors);
                    }
                }
                else if( $plano == 'Pro')
                {
                    $tags = explode(',',$request['tags']);
                    if(count($tags) <= 15)
                    {

                    }
                    else
                    {
                        $errors = $validator->getMessageBag();
                        $errors->add('ErroTags','Seu plano não permite mais de 15 tags.');

                        return redirect()->back()->with('errors',$errors);
                    }
                }
            }
            else
            {

            }
        }

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

    public function BuscaEmpresa($nomeFantasia)
    {
        return Empresa::where('nomeFantasia','like','%'+$nomeFantasia+'%')->get();
    }
}

