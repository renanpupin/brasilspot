@extends('layouts.master')

@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @include('layouts.sidebarVendedor')
@stop

@section('content')

    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>Histórico de Vendas</h2>
    </div>

    <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ url('Metas/Historico') }}">Histórico</a></li>
                    <li>Listar</li>
                </ul>
            </div>
        </div>
    </div>


    <div id="listagem" class="grid-m-12 grid-s-12">
        <div class="table-responsive">
            <table id="listaClientes" class="table">
                <thead>
                    <th>Empresa</th>
                    <th>Plano</th>
                    <th>Data de Cadastro</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Imobiliária X</td>
                        <td>PRO</td>
                        <td>12/10/2015</td>
                    </tr>
                    <tr>
                        <td>Imobiliária Y</td>
                        <td>Básico</td>
                        <td>22/10/2015</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@stop