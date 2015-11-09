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
                <div class="text-headline">Acompanhe seu histórico</div>
            </div>
            <div class="grid-m-12 grid-s-12 grid-xs-12">
                <div class="row">
                    <div class="grid-m-6 grid-s-6 grid-xs-12">
                        <img class="grafico" src="http://www.janwillemtulp.com/wp-content/uploads/2011/03/Line-chart.png" style="width: 100%;">
                    </div>
                    <div id="listagem" class="grid-m-6 grid-s-6 grid-xs-6">
                        <div class="table-responsive">
                            <table id="listaClientes" class="table">
                                <thead>
                                <th>Mês</th>
                                <th>Ano</th>
                                <th>Valor</th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Setembro</td>
                                    <td>2015</td>
                                    <td>R$ 1.000,00</td>
                                </tr>
                                <tr>
                                    <td>Outubro</td>
                                    <td>2015</td>
                                    <td>R$ 1.500,00</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop