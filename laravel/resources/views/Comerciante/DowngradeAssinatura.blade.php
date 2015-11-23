@extends('layouts.master')

@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @include('layouts.sidebarComerciante')
@stop

@section('content')

    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>Downgrade da Assinatura #1</h2>
    </div>

    <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ url('SuaAssinatura') }}">Sua Assinatura</a></li>
                    <li>Downgrade</li>
                </ul>
            </div>
        </div>
    </div>

    <div id="listagem" class="grid-m-12 grid-s-12 grid-xs-12">
        <p>Para fazer downgrade de sua assinatura, é necessário alterar suas informações na plataforma pagar.me.</p>
        <p>Altere seu plano e em breve atualizaremos sua assinatura.</p>
    </div>

    <div class="form-group grid-m-3 grid-m-offset-6 grid-s-3 grid-s-offset-6 button-field">
        <a href="{{ url('SuaAssinatura') }}" id="btnVoltar" title="Voltar" class="btn btn-secundary ripple">
            <span class="text-content">Voltar</span>
        </a>
    </div>

    <div class="form-group grid-m-3 grid-s-3 grid-xs-12">
        <a href="{{url('http://pagar.me')}}" target="_blank" class="btn btn-success">Downgrade</a>
    </div>

@stop