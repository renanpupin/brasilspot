<?php

namespace App\Http\Controllers;

use App\MetaVendedor;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Empresa;
use \App\Vendedor;
use \App\Meta;
use \App\TipoMeta;
use \App\Usuario;
use Illuminate\Support\Facades\Session;
use Validator;
use Auth;
use DB;

class VendedorController extends Controller
{

    public function index()
    {
        $vendedores = Vendedor::all();

    }


    public function create()
    {
        $usuarios = Usuario::all();
        $usuariosSelect = array();

        foreach ($usuarios as $usuario ) {
            $usuariosSelect[$usuario->Id] = $usuario->Nome;
        }

        $tipos = TipoVendedor::all();
        $tiposSelect = array();

        foreach ($tipos as $tipo ) {
            $tiposSelect[$tipo->Id] = $tipo->Tipo;
        }

        $metas = Meta::all();
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
        Vendedor::create([
            'IsCoordenador' => $request['isCoordenador'],
            'IdUsuario' => $request['usuarios'],
            'IdTipo' => $request['tipos'],
            'IdMeta' => $request['metas'],
            'IdVendedorPai' => $request['vendedorPai']
        ]);

        return "Vendedor Registrado com sucesso!!";
    }

    public function mapa()
    {
        $vendedores = User::whereHas('PerfilUsuario',function($query)
        {
            $query->where('tipo','=','Vendedor');
        })->with('PerfilUsuario')->get();

        return view('Vendedor.Mapa')->with('vendedores',$vendedores);
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

    public function desempenho()
    {
        $usuario = Auth::User();

        $novos_clientes = Empresa::where( DB::raw('MONTH(dataCadastro)'), '=', date('n') )->where('idVendedor','=',$usuario)->count();
//        dd($novos_clientes);
        return view('Vendedor.Desempenho')->with("novos_clientes", $novos_clientes);
    }

    public function vincularMeta($id){

        $vendedor = Vendedor::where('idUsuario','=',$id)->first();

        $metasVendedor = MetaVendedor::where('idVendedor','=',$vendedor->id)->with('Meta')->with('Meta.TipoMeta')->get();

        return view('Vendedor.VincularMetaIndex')->with("vendedor", $vendedor)->with("metasVendedor", $metasVendedor);
    }

    public function adicionarMeta($id){

        $vendedor = Vendedor::where('idUsuario','=',$id)->first();

        $metas = ['-1'=>'Selecione a meta'] + Meta::lists('nome', 'id')->all();

        return view('Vendedor.VincularMetaAdicionar')->with("vendedor", $vendedor)->with("metas", $metas);
    }

    public function gravarMetaAdicionada(Request $request, $id){

        if($request['metas'] == "-1"){
            $request['metas'] = "";
        }

        $regras = array(
            'metas' => 'required'
        );

        $mensagens = array(
            'required' => 'Selecione a meta.'
        );

        $validator = Validator::make($request->all(), $regras, $mensagens);

        if ($validator->fails()) {
            return redirect('Vendedor/VincularMetas/Adicionar/'.$id)
                ->withErrors($validator)
                ->withInput();
        }

        $vendedor = Vendedor::where('idUsuario','=',$id)->first();

        MetaVendedor::Create([
            'idMeta' => $request['metas'],
            'idVendedor' => $vendedor->id
        ]);

        Session::flash('flash_message', 'Meta vinculada com sucesso!');

        return redirect()->back();
    }

    public function removerMetaVendedor($id){

        $metaVendedor = MetaVendedor::find($id);

        if(!empty($metaVendedor))
        {
            $metaVendedor->delete();
            Session::flash('flash_message', 'Meta desvinculada com sucesso!');
            return redirect()->back();
        }

        //TODO: retornar erro e não mensagem
        return 'A meta do Vendedor não foi encontrada';
    }

}
