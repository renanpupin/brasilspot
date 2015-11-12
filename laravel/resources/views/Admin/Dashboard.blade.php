@extends('layouts.master')

@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @include('layouts.sidebarAdmin')
@stop

@section('content')

    <div class="grid-m-12 grid-s-12 grid-xs-12">
        <h2>Dashboard</h2>
    </div>

    <div id="dashboard" class="grid-m-12 grid-s-12 grid-xs-12">

        <div class="row">
            <div class="grid-m-12 grid-s-12 grid-xs-12">
                <div class="text-headline">Informações importantes</div>
            </div>
            <div class="grid-m-12 grid-s-12 grid-xs-12">
                <p>Número de clientes cadastrados <b>12</b>.</p>
            </div>
            <div class="grid-m-12 grid-s-12 grid-xs-12">
                <p>Número de clientes novos neste mês <b>30</b>.</p>
            </div>
            <div class="grid-m-12 grid-s-12 grid-xs-12">
                <p>Número de cancelamentos neste mês <b>3</b>.</p>
            </div>
        </div>
    </div>

@stop