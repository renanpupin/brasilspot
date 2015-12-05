<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PagamentoTests extends TestCase
{


    public function testePagamentoInfoCartaoVerificarRequireds()
    {

        $this->visit('/Pagamento/Calcular')
            ->press('btnprox')
            ->seePageIs('/Pagamento/InfoCartao')
            ->select('unico', 'payment')
            ->type('30260641400977', 'card_number')
            ->type('Test Subject phpunit', 'card_holder_name')
            ->type('08', 'card_expiration_month')
            ->type('2020', 'card_expiration_year')
            ->type('660', 'card_cvv')
            ->press('card_form_submit')
            ->seePageIs('/Pagamento/Efetivar');
    }



}
