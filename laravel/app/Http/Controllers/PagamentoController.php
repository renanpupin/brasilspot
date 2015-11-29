<?php

namespace App\Http\Controllers;

use App\AssinaturaComerciante;
use App\AssinaturaFilial;
use PagarMe;
use PagarMe_Transaction;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

use App\Transacao;
use App\TipoTransacao;
use App\EstadoTransacao;
use App\Comerciante;
use App\PerfilUsuario;
use App\User;
use App\Vendedor;

use DB;
use BaseController;


class PagamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { //Pagamento/Confirmar

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { //Pagamento/Efetivar
        if(isset($request['selecionarPlano'])) {
            dd($request);
            dd(AssinaturaComerciante::where('idComerciante', '=', $request['id'])->count() . ' ' .
            (Usuario::with('idUsuario', '=', $request['id'])->count()));
            //each
//              id é idComerciante
//            idUsuario
//            selecionarPlano

            DB::beginTransaction();
            $transacao = null;
            try {
                $transacao = Transacao::create([
                    'fkEmpresa' => '1',
                    'fkCartao' => '1',
                    'fkEstadoTransacao' => '1',
                    'fkTipoTransacao' => '1',
                    'valorBruto' => '100,00', //amount em centavos
                    'cardHash' => $request['card_hash'],
                    'dataInicio' => date('d-m-y'),
                    'dataResposta' => date('d-m-y')
                ]);

            } catch (Exception $exception) {
                DB::rollBack();
                return 'Problema com banco';
            }
            DB::commit();

            Pagarme::setApiKey("ak_test_1jVGAUzxWNanzfTiW6yGX0cbA8Ywq7");

            $transaction = new PagarMe_Transaction(array(
                'amount' => strtr($transacao->valorBruto, array('.' => '', ',' => '')),
                'card_hash' => $request['card_hash']
            ));

            $transaction->charge();

            $status = $transaction->status; // status da transação
            return 'Tapago! ' . $status;
        } else { //exemplo
            DB::beginTransaction();
            $transacao = null;
            try {
                $transacao = Transacao::create([
                    'fkEmpresa' => '1',
                    'fkCartao' => '1',
                    'fkEstadoTransacao' => '1',
                    'fkTipoTransacao' => '1',
                    'valorBruto' => '100,00', //amount em centavos
                    'cardHash' => $request['card_hash'],
                    'dataInicio' => date('d-m-y'),
                    'dataResposta' => date('d-m-y')
                ]);

            } catch (Exception $exception) {
                DB::rollBack();
                return 'Problema com banco';
            }
            DB::commit();

            Pagarme::setApiKey("ak_test_1jVGAUzxWNanzfTiW6yGX0cbA8Ywq7");

            $transaction = new PagarMe_Transaction(array(
                'amount' => strtr($transacao->valorBruto, array('.' => '', ',' => '')),
                'card_hash' => $request['card_hash']
            ));

            $transaction->charge();

            $status = $transaction->status; // status da transação
            return 'Tapago! ' . $status;
        }
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
