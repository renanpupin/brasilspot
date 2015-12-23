<?php

namespace App\Http\Controllers;


use Auth;
use Validator;
use PagarMe;
use PagarMe_Transaction;

USE App\Transacao;
USE App\Pagamento;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

use DB;
use BaseController;


class PagamentoController extends Controller
{
    public function prepararPagamentoGet(Request $request) { //Calcular

        if (! Auth::check()) {
            Redirect::to('Login');
        }

        $idUsuario = Auth::id();

        $asCom = DB::table('assinaturas')
            ->join('assinaturasFiliais', 'assinaturasFiliais.idAssinatura', '=', 'assinaturas.id')
            ->join('filiais', 'assinaturasFiliais.idFilial', '=', 'filiais.id')
            ->join('empresas', 'empresas.id', '=', 'filiais.idEmpresa')
            ->join('planos', 'assinaturas.idPlano', '=', 'planos.id')
            ->join('comerciantes', 'assinaturas.idComerciante', '=', 'comerciantes.id')
            ->select('planos.valor', 'assinaturas.id', 'empresas.nomeFantasia', 'comerciantes.idUsuario')
            ->where('comerciantes.idUsuario', $idUsuario)
            ->get();

        foreach($asCom as $values) {
            $values->valor = Transacao::convertePontotoVirgula($values->valor);

        }
        return view('Pagamento/Calcular', array("values" => $asCom));
    }

    public function create(Request $request)
    { //Pagamento/InfoCartao
        $inputArray = $request->all();

        Session::flash('checkbox', $inputArray['checkbox']); // or rather $result?

        $valorReal = Transacao::converteStringRStoPonto($inputArray['totalTotalis']);

        return view('Pagamento/InfoCartao')
            ->with("valorPagamento", "R$ ".str_replace('.',',',sprintf("%.2F",$valorReal)))
            ->with("dirtyValorPagamento", $valorReal);
    }

    public function store(Request $request)
    { //Pagamento/Efetivar
        $inputArray = $request->all();

        $mensagensErro = array(
            'min' => 'Valor a ser pago invalido.',
            'numeric' => 'Valor a ser pago invalido.',
            'valor_pagamento_positivo_minimo_valido' => 'Valor a ser pago não pode ser inferior a 1',
        );
        Validator::extend(
            'valor_pagamento_positivo_minimo_valido',
            function ($attribute, $value, $parameters)
            {
                if (str_contains($value,'R$ ')) {
                    $floated = floatval(str_replace(',' , '.', ltrim($value,"R$ ") ));
                    if($floated < 1) {
                        return false;
                    }
                    else {
                        return true;
                    }
                } else {
                    return false;
                }
            }
        );

        $validator = Validator::make($inputArray, [
            'valorPagamento' => 'required|min:1|valor_pagamento_positivo_minimo_valido',
            'payment' => 'required'
        ], $mensagensErro);

        if ($validator->fails()) {
            return Redirect::to('Pagamento/Calcular')->withErrors($validator);
        }

        Pagarme::setApiKey("ak_test_1jVGAUzxWNanzfTiW6yGX0cbA8Ywq7");

        $checkboxes = Session::get('checkbox');

        $valorRealGet = 0.0;
        $idUsuario = Auth::id();
        $asCom = DB::table('assinaturas')
            ->join('assinaturasFiliais', 'assinaturasFiliais.idAssinatura', '=', 'assinaturas.id')
            ->join('filiais', 'assinaturasFiliais.idFilial', '=', 'filiais.id')
            ->join('empresas', 'empresas.id', '=', 'filiais.idEmpresa')
            ->join('planos', 'assinaturas.idPlano', '=', 'planos.id')
            ->join('comerciantes', 'assinaturas.idComerciante', '=', 'comerciantes.id')
            ->select('planos.valor', 'assinaturas.id as idAssinatura', 'empresas.nomeFantasia', 'comerciantes.idUsuario as idUsuario',
                'empresas.id as idEmpresa')
            ->whereIn('assinaturas.id', array_values(array(1 => 1, 2 => 2, 3 => 3, 4 => 4)))  //$checkboxes))
            ->get();



        foreach($asCom as $single) {
            $valorRealGet = $valorRealGet + $single->valor;
        }
        $idEmpresa = $asCom[0]->idEmpresa;

        $transacao = null;
        $transacao = Transacao::create([
            'idUsuario' => $idUsuario,
            'idTipoTransacao' => Transacao::getTipoTransacao($inputArray['payment']),
            'idEstadoTransacao' => '1',
            'valorBruto' => $valorRealGet,
            'cardHash' => Transacao::getSkipCardHash($inputArray),
            'dataInicio' => date('d-m-y'),
            'dataResposta' => date('d-m-y')
        ]);


        foreach($asCom as $single) {
            $pagamento = Pagamento::create([
                'idUsuario' => $idUsuario,
                'valor' => $single->valor,
                'dataPagamento' => date('d-m-y'),
                'dataBaixa' => date('d-m-y'),
                'idAssinatura' => $single->idAssinatura,
                'idTransacao' => $transacao->id,
                'validade' => null,
                'isPaid' => false
            ]);
        }


        switch ($transacao->idTipoTransacao) {
            //TODO: fazer a pagina mostrando pagamento efetuado etc
            default:
            case 1:  //pagamentocartaosimples
                $transactionPagarMe = new PagarMe_Transaction(array(
                    'amount' => $transacao->valorBruto,
                    'card_hash' => $transacao->cardHash
                ));
                $transactionPagarMe->charge();
                return $status = $transactionPagarMe->status;

            case 2: ///assinatura
                $transactionPagarMe = new PagarMe_Transaction(array(
                    'amount' => $transacao->valorBruto,
                    'card_hash' => $transacao->cardHash
                ));
                $transactionPagarMe->charge();
                $card = new PagarMe_Card(array(
                    'card_hash' => $transacao->cardHash
                ));
                $card->create();
                $card_id = $card->id;

                //TODO: arrumar para pegar o cartão correto, qual tabela salvar, criar CRONJOB para recobrar
                //$assinatura = Assinatura::find("1");

                return $status = $transactionPagarMe->status . ' ' . $card_id;

            case 3: //boleto
                dd($transacao->valorBruto);

                $transaction = new PagarMe_Transaction(array(
                    'amount' => $transacao->valorBruto,
                    'payment_method' => "boleto"
                ));

                $transaction->charge();
                $boleto_url = $transaction->boleto_url; // URL do boleto bancário
                $boleto_barcode = $transaction->boleto_barcode; // código de barras do boleto bancário

                return ($boleto_barcode . ' ' . $boleto_url);

                //return Redirect::to($boleto_url);
        }
    }

}
