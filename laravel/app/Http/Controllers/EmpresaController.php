<?php

namespace App\Http\Controllers;
use App\CartaoAceito;
use App\CategoriaEmpresa;
use App\FotoEmpresa;
use App\ServicoEmpresa;
use App\Tag;
use App\TagEmpresa;
use Mockery\CountValidator\Exception;
use PhpParser\Node\Expr\Cast\Array_;
use Validator;
use Illuminate\Http\Request;
use App\Empresa;
use App\User;
use App\TipoEmpresa;
use App\Plano;
use App\Vendedor;
use App\Categoria;
use App\Cartao;
use App\TipoCartao;
use Illuminate\Support\Facades\Session;
use Input;
use Redirect;
use Gate;
use DB;
use Auth;
use Response;
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

        $empresas = Empresa::with('TipoEmpresa')->get();

        return view('Empresa.Index')->with('empresas',$empresas);
    }

    public function create()
    {
        $usuario = Auth::User();

        $tiposEmpresas = ['-1'=>'Selecione o tipo do empreendimento'] + TipoEmpresa::orderBy('tipo','asc')->lists('tipo','id')->all();
        $categorias = ['-1'=>'Selecione a categoria'] + Categoria::orderBy('nome','asc')->lists('nome','id')->all();
        $cartoes = Cartao::orderBy('tipo','asc')->get();
        $vendedores  = ['-1'=>'Selecione o usuário'] + Vendedor::with('Usuario')->get()->lists('Usuario.name','id')->all();
        $tiposCartoes = ['-1'=>'Selecione o tipo dos cartões'] + TipoCartao::orderBy('descricao','asc')->lists('descricao','id')->all();

        if(Gate::allows('AcessoComerciante')) {
            return view('Empresa.Create')
                ->with('tiposEmpresas', $tiposEmpresas)
                ->with('cartoes', $cartoes)
                ->with('categorias', $categorias)
                ->with('vendedores', $vendedores)
                ->with('tiposCartoes', $tiposCartoes);
        }
        else
            if(Gate::allows('AcessoVendedor'))
            {
                $usuarios = ['-1'=>'Selecione o cliente'] + DB::table('users')
                    ->leftJoin('empresas','empresas.idUsuario','=','users.id')
                    ->leftJoin('perfisUsuarios','perfisUsuarios.id','=','users.idPerfilUsuario')
                    ->where('tipo','=','Comerciante')
                    ->where('idUsuario','=',null)
                    ->select(['users.id','users.name','empresas.idUsuario','perfisUsuarios.tipo'])->lists('name','id');

                return view('Empresa.Create')
                    ->with('usuarios', $usuarios)
                    ->with('tiposEmpresas', $tiposEmpresas)
                    ->with('cartoes', $cartoes)
                    ->with('categorias', $categorias)
                    ->with('vendedores', $vendedores)
                    ->with('tiposCartoes', $tiposCartoes);
            }
        return view('401');
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
            'tiposEmpreendimentos' => 'required|not_in:-1',
            'categorias' => 'required|not_in:-1',
            'tiposCartoes' => 'required|not_in:-1'
        );

        $mensagens = array(
            'nomeEmpreendedor.required' => 'O campo Nome do Empreendedor deve ser preenchido.',
            'nomeFantasia.required' => 'O campo Nome Fantasia deve ser preenchido.',
            'cpfCnpj.required' => 'O campo CPF ou CNPJ deve ser preenchido.',
            'email.required' => 'O campo Email deve ser preenchido.',
            'descricao.required' => 'O campo Descrição deve ser preenchido.',
            'horarioFuncionamento.required' => 'O campo Horário de Funcionamento deve ser preenchido.',
            'tiposEmpreendimentos.required' => 'O campo Tipo do Empreendimento deve ser selecionado.',
            'categorias.required' => 'O campo Categorias deve ser selecionado.',
            'tiposCartoes.required' => 'O campo Tipos de cartões aceitos deve ser selecionado.',
            'tiposEmpreendimentos.not_in' => 'O campo  Tipo do Empreendimento deve ser selecionado.',
            'categorias.not_in' => 'O campo Categorias deve ser selecionado.',
            'tiposCartoes.not_in' => 'O campo Tipos de cartões aceitos deve ser selecionado.',
            'string' => 'O campo :attribute deve ser texto.'
        );

        $validator = Validator::make($request->all(),$regras,$mensagens);

        if ($validator->fails()) {
            return redirect('Empresa/cadastrar')
                ->withErrors($validator)
                ->withInput();
        }

        $usuarioLogado = Auth::user();

        if(Gate::allows('AcessoComerciante'))
        {
            $planoUsuario = $usuarioLogado->Comerciante->with('Plano')->first();
            $plano = $planoUsuario->Plano->nome;

            if(!empty($plano))
            {
                $empresa = Empresa::create([
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
                    'idTipoEmpresa' => $request['tiposEmpreendimentos'],
                    'idVendedor' => $usuarioLogado->Vendedor->id,
                    'idTipoCartao' => $request['tiposCartoes'],
                    'dataCadastro' => date("Y/m/d")
                ]);

                $categoria = CategoriaEmpresa::create([
                    'idEmpresa' => $empresa->id,
                    'idCategoria' => $request['categorias']
                ]);

                $qtdCartao = DB::table('cartoes')->count();

                //TODO: Refatorar isso depois, pode dar errado caso os ids não estejam em ordem na tabela
                for($i=0;$i<=$qtdCartao;$i++)
                {
                    if(!is_null($request[$i])){
                        $cartoesAceitos = CartaoAceito::create([
                            'idEmpresa' => $empresa->id,
                            'idCartao' => $i
                        ]);
                    }
                }

                $usuario = User::where('id','=',$request['usuarios'])->first()->load('Comerciante')->load('Comerciante.Plano');

                if( $plano == 'Básico')
                {
                    $tags = explode(',',$request['tags']);
                    if(count($tags) <= 5)
                    {


//                $foto = FotoEmpresa::create([
//
//                ]);

                        if($usuario->Comerciante->Plano->nome == 'Básico') {
                            for ($i = 0,$max = 0; $i < count($tags) && $max<5; $i++) {
                                if(!empty($tags[$i]))
                                {
                                    $tag = Tag::create([
                                        'nome' => $tags[$i]
                                    ]);

                                    $tagEmpresa = TagEmpresa::create([
                                        'idEmpresa' => $empresa->id,
                                        'idTag' => $tag->id
                                    ]);
                                    $max++;
                                }
                            }
                        }
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
                        if($usuario->Comerciante->Plano->nome == 'Pro') {
                            for ($i = 0,$max = 0; $i < count($tags) && $max<15; $i++) {
                                if(!empty($tags[$i]))
                                {
                                    $tag = Tag::create([
                                        'nome' => $tags[$i]
                                    ]);

                                    $tagEmpresa = TagEmpresa::create([
                                        'idEmpresa' => $empresa->id,
                                        'idTag' => $tag->id
                                    ]);
                                    $max++;
                                }
                            }
                        }
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
        else if(Gate::allows('AcessoVendedor'))
        {
            $usuarioLogado = $usuarioLogado->load('Vendedor');

            $regras = array(
                'usuarios' => 'required|not_in:-1'
            );

            $mensagens = array(
                'usuarios.required' => 'O campo Clientes deve ser selecionado.',
                'usuarios.not_in' => 'O campo Clientes deve ser selecionado.'
            );

            $validator = Validator::make($request->all(),$regras,$mensagens);

            if ($validator->fails()) {
                return redirect('Empresa/create')
                    ->withErrors($validator)
                    ->withInput();
            }

            DB::beginTransaction();

            try {

                $empresa = Empresa::create([
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
                    'idTipoEmpresa' => $request['tiposEmpreendimentos'],
                    'idVendedor' => $usuarioLogado->Vendedor->id,
                    'idTipoCartao' => $request['tiposCartoes'],
                    'dataCadastro' => date("Y/m/d")
                ]);

                $categoria = CategoriaEmpresa::create([
                    'idEmpresa' => $empresa->id,
                    'idCategoria' => $request['categorias']
                ]);

                $qtdCartao = DB::table('cartoes')->count();

                //TODO: Refatorar isso depois, pode dar errado caso os ids não estejam em ordem na tabela
                for($i=0;$i<=$qtdCartao;$i++)
                {
                    if(!is_null($request[$i])){
                        $cartoesAceitos = CartaoAceito::create([
                            'idEmpresa' => $empresa->id,
                            'idCartao' => $i
                        ]);
                    }
                }


//                $foto = FotoEmpresa::create([
//
//                ]);

                $tags = explode(',',$request['tags']);

                $usuario = User::where('id','=',$request['usuarios'])->first()->load('Comerciante')->load('Comerciante.Plano');

                if($usuario->Comerciante->Plano->nome == 'Básico') {
                    for ($i = 0,$max = 0; $i < count($tags) && $max<5; $i++) {
                        if(!empty($tags[$i]))
                        {
                            $tag = Tag::create([
                                'nome' => $tags[$i]
                            ]);

                            $tagEmpresa = TagEmpresa::create([
                                'idEmpresa' => $empresa->id,
                                'idTag' => $tag->id
                            ]);
                            $max++;
                        }
                    }
                }
                else
                    if($usuario->Comerciante->Plano->nome == 'Pro') {
                        for ($i = 0,$max = 0; $i < count($tags) && $max<15; $i++) {
                            if(!empty($tags[$i]))
                            {
                                $tag = Tag::create([
                                    'nome' => $tags[$i]
                                ]);

                                $tagEmpresa = TagEmpresa::create([
                                    'idEmpresa' => $empresa->id,
                                    'idTag' => $tag->id
                                ]);
                                $max++;
                            }
                        }
                    }

//                $servicoEmpresa = ServicoEmpresa::create([
//                    'idEmpresa' => $empresa->id,
//                    'idServico' =>'',
//                ]);

            }
            catch(Exception $exception)
            {
                DB::rollBack();
                $errors = $validator->getMessageBag();
                $errors->add('ErroException', 'Não foi possivel cadastrar a empresa.');
                return redirect()->back();
            }

            DB::commit();

            Session::flash('flash_message', 'Empresa adicionada com sucesso!');

            return redirect()->back();
        }
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

    public function uploadFiles() {

        $input = Input::all();

        $rules = array(
            'file' => 'image|max:3000',
        );

        $validation = Validator::make($input, $rules);

        if ($validation->fails()) {
            return Response::make($validation->errors->first(), 400);
        }

        $destinationPath = 'uploads'; // upload path
        $extension = Input::file('file')->getClientOriginalExtension(); // getting file extension
        $fileName = rand(11111, 99999) . '.' . $extension; // renameing image
        $upload_success = Input::file('file')->move($destinationPath, $fileName); // uploading file to given path

        if ($upload_success) {
            return Response::json('success', 200);
        } else {
            return Response::json('error', 400);
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

    public function pesquisarEmpresa()
    {
        //ajax and json
        $query = Input::get("query");

        $registers = Empresa::where('nomeFantasia','like','%'.$query.'%')->get();

//        if($registers->isEmpty()){
//            $registers = Categoria::where('nome','like','%'.$query.'%')->get();
//        }

        return Response::json($registers);
    }


    public function pesquisarEndereco()
    {
        $query = Input::get("query");

        $registers = Endereco::where('endereco','like','%'.$query.'%')->orWhere('cidade','like','%'.$query.'%')->orWhere('estado','like','%'.$query.'%')->get();

        return Response::json($registers);
    }

    public function filtroEmpresas($categoria, $subcategoria = null)
    {
        $servicos = Input::get("servico");  //um ou varios
        $estado = Input::get("em");


        //a subcategoria é opcional e os serviços e estado podem vir ou não
        if( $subcategoria){
            $servicos = Input::get("servicos");
            dd($categoria, $subcategoria, $estado, explode(",", $servicos));
        }else {
            $servicos = Input::get("servicos");
            dd($categoria , $estado, explode(",", $servicos));

        }
        //Todo: busca de empresas pelos parâmetros informados na url
        //EX: http://localhost:8000/Empresas/encontre/restaurantes/padaria?em=sp&servicos=wifi,delivery

    }

    public function listarPorCategoria($slug){

        //TODO:buscar id da categoria pelo slug (ver funçao slug do eloquent) e retornar as empresas paginadas por esta categoria
        //Se a categoria possuir filhas, então traz as empresas da categoria filha também
        return view('Categoria')->with('slug',$slug);
    }
}

