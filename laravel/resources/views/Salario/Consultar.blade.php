@extends('layouts.master')

@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @include('layouts.sidebarVendedor')
@stop

@section('content')

    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>Consultar Salário</h2>
    </div>

    <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ url('Salario/Consultar') }}">Salário</a></li>
                    <li>Consultar</li>
                </ul>
            </div>
        </div>
    </div>


    <div id="listagem" class="grid-m-12 grid-s-12">
        <p>Seu salário até o momento é de <b>R$ 10.000,00</b>.</p>
    </div>
@stop