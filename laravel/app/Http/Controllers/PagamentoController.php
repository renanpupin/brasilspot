<?php

namespace App\Http\Controllers;


use Auth;
use Validator;
use PagarMe;
use PagarMe_Transaction;

use App\Cartao;
use App\AssinaturaComerciante;
use App\AssinaturaFilial;
use App\Assinatura;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

use App\Transacao;


use DB;
use BaseController;


class PagamentoController extends Controller
{
    public function prepararPagamentoGet(Request $request) { //Calcular
        //TODO: mandar o post correto para esta controller
        $values = array(
            "0" => array(
                'valor' => "35,01",
                'descricao' => "Filial de sorocaba",
                'id' => 10
            ),
            "1" => array(
                'valor' => "15,04",
                'descricao' => "Filiar de mandioquinha",
                'id' => 15
            )
        );

        $asCom = AssinaturaComerciante::all()->toArray();
        foreach ($asCom as $single) {
            //$single['newField'] = "data";
            $assina = Assinatura::find(['id' => $single['idAssinatura']])->first();
            $assina->test = $single['idComerciante'];
            $assina->save();

        }
        dd("wedidit");
        return view('Pagamento/Calcular')->with("values", $values);
    }

    public function create(Request $request)
    { //Pagamento/InfoCartao
        $inputArray = $request->all();

        $valorReal = str_replace('R$ ','', $inputArray['totalTotalis']);
        $valorReal = str_replace(',','.',$valorReal);
        $valorReal = floatval($valorReal);

        return view('Pagamento/InfoCartao')
            ->with("valorPagamento", "R$ ".str_replace('.',',',$valorReal))
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


        //TODO: GET CORRECT VALUES, FIXED VALUES HERE
        //TODO: verificar se todos os valores estão corretos mesmo
        $transacao = null;
        $transacao = Transacao::create([
            'fkEmpresa' => '5',
            'fkCartao' => '1',
            'fkEstadoTransacao' => '1',
            'fkTipoTransacao' => Transacao::getTipoTransacao($inputArray['payment']),
            'valorBruto' => Transacao::converteCentavos($inputArray['valorPagamento']),
            'cardHash' => Transacao::getSkipCardHash($inputArray),
            'dataInicio' => date('d-m-y'),
            'dataResposta' => date('d-m-y')
        ]);

        switch ($transacao->fkTipoTransacao) {
            //TODO: fazer a pagina mostrando pagamento efetuado etc
            default:
            case 1:
                $transactionPagarMe = new PagarMe_Transaction(array(
                    'amount' => $transacao->valorBruto,
                    'card_hash' => $transacao->cardHash
                ));
                $transactionPagarMe->charge();
                return $status = $transactionPagarMe->status;

            case 2:
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

            case 3:

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
