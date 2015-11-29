<?php

namespace App\Http\Controllers;

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
        DB::beginTransaction();
        try {
            $transacao = Transacao::create([
                'fkEmpresa' => '1',
                'fkCartao' => '1',
                'fkEstadoTransacao' => '1',
                'fkTipoTransacao' => '1',
                'valorBruto' => '1',
                'cardHash' => $request['card_hash'],
                'dataInicio' => '1',
                'dataResposta' => '1'
            ]);

        } catch (Exception $exception) {
            DB::rollBack();
            return 'whoops';
        }
        DB::commit();
        return "R:".$request['card_hash'];


        Pagarme::setApiKey("ak_test_1jVGAUzxWNanzfTiW6yGX0cbA8Ywq7");

        $transaction = new PagarMe_Transaction(array(
            'amount' => 1000,
            'card_hash' => $request['card_hash']
        ));

        $transaction->charge();

        $status = $transaction->status; // status da transação

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
