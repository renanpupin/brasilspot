@extends('layouts.master')

@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @include('layouts.sidebarVendedor')
@stop

@section('content')

    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>Histórico de Salário</h2>
    </div>

    <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ url('Salario/Historico') }}">Salário</a></li>
                    <li>Histórico</li>
                </ul>
            </div>
        </div>
    </div>


    <div id="listagem" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="table-responsive">
            <table id="listaClientes" class="table">
                <thead>
                    <th>Data</th>
                    <th>Valor (R$)</th>
                </thead>
                <tbody>
                <tr>
                    <td>11/11/2015</td>
                    <td>150,00</td>
                </tr>
                <tr>
                    <td>10/12/2015</td>
                    <td>350,00</td>
                </tr>
                {{--@foreach($salarios as $salario)--}}
                    {{--<tr>--}}
                        {{--<td>{{ $salario->dataPagamento }}</td>--}}
                        {{--<td>{{ $servico->valor }}</td>--}}
                    {{--</tr>--}}
                {{--@endforeach--}}
                </tbody>
            </table>
        </div>
    </div>
@stop