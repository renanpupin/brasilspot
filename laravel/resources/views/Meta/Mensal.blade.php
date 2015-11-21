@extends('layouts.master')

@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @include('layouts.sidebarVendedor')
@stop

@section('content')

    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>Meta Mensal</h2>
    </div>

    <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ url('Metas/Historico') }}">Metas</a></li>
                    <li>Mensal</li>
                </ul>
            </div>
        </div>
    </div>


    <div id="listagem" class="grid-m-12 grid-s-12">
        <p>Sua meta mensal é de <b>30</b> empresas.</p>
    </div>
@stop