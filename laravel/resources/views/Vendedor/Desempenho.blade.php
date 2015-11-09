@extends('layouts.master')

@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @include('layouts.sidebarVendedor')
@stop

@section('content')

    <div class="grid-m-12 grid-s-12 grid-xs-12">
        <h2>Seu desempenho</h2>
    </div>

    <div id="dashboard" class="grid-m-12 grid-s-12 grid-xs-12">

        <div class="row">
            <div class="grid-m-12 grid-s-12 grid-xs-12">
                <p>Você já conseguiu <b>12</b> novos clientes neste mês.</p>
            </div>
            <div class="grid-m-12 grid-s-12 grid-xs-12">
                <div class="text-headline">Acompanhe seu histórico através do gráfico abaixo</div>
                <img src="http://www.janwillemtulp.com/wp-content/uploads/2011/03/Line-chart.png">
            </div>
        </div>
    </div>

@stop