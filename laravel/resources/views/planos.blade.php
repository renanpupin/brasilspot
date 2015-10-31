@extends('layouts.master')

@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @include('layouts.navbarSite')
@stop

@section('content')

    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>Planos</h2>
        <h6>Conheça as vantagens dos nossos planos</h6>
    </div>

    <div id="listagem" class="grid-m-12 grid-s-12 grid-xs-12">
        <div id="planos" class="pricing-table grid-m-12">
            <div class="pricing-item">
                <div class="pricing-title">
                    BÁSICO
                </div>
                <div class="pricing-value">R$19.<span class="smallText">90</span>
                    <span class="undertext">/Mês</span>
                </div>
                <ul class="pricing-features">
                    <li><span class="keywords">1GB</span> Armazenamento</li>
                    <li>Banda <span class="keywords">ilimitada</span></li>
                    <li><span class="keywords">10 Contas</span> de email</li>
                    <li><span class="keywords">50gb</span> Transferência</li>
                </ul>
                <div class="button">Comprar</div>
            </div>

            <div class="pricing-item pricing-featured">
                <div class='selected'>Recomendado</div>
                <div class="pricing-title">
                    PRO
                </div>
                <div class="pricing-value">R$39.<span class="smallText">90</span>
                    <span class="undertext">/Mês</span>
                </div>
                <ul class="pricing-features">
                    <li><span class="keywords">5GB</span> Armazenamento</li>
                    <li>Banda <span class="keywords">ilimitada</span></li>
                    <li><span class="keywords">100 Contas</span> de email</li>
                    <li><span class="keywords">100gb</span> Transferência</li>
                </ul>
                <div class="button">Comprar</div>
            </div>
        </div>
    </div>

@stop