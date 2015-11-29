@extends('layouts.master')

@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @can('AcessoComerciante')
    @include('layouts.sidebarComerciante')
    @endcan
    @can('AcessoVendedor')
    @include('layouts.sidebarVendedor')
    @endcan
    @can('AcessoAdministrador')
    @include('layouts.sidebarAdmin')
    @endcan
@stop

@section('content')

    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>Upgrade da Assinatura #1</h2>
    </div>

    <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ url('SuaAssinatura') }}">Sua Assinatura</a></li>
                    <li>Upgrade</li>
                </ul>
            </div>
        </div>
    </div>

    <div id="listagem" class="grid-m-12 grid-s-12 grid-xs-12">
        <p>Para fazer upgrade de sua assinatura, é necessário realizar o pagamento através da plataforma pagar.me.</p>
        <p>Realize o pagamento e em breve atualizaremos sua assinatura.</p>
    </div>

    <div class="form-group grid-m-3 grid-m-offset-6 grid-s-3 grid-s-offset-6 button-field">
        <a href="{{ url('SuaAssinatura') }}" id="btnVoltar" title="Voltar" class="btn btn-secundary ripple">
            <span class="text-content">Voltar</span>
        </a>
    </div>

    <div class="form-group grid-m-3 grid-s-3 grid-xs-12">
        <a href="{{url('http://pagar.me')}}" target="_blank" class="btn btn-success">Upgrade</a>
    </div>

@stop