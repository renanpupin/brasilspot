@extends('layouts.master')

@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @include('layouts.sidebarSistema')
@stop

@section('content')

    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>Mapa de Vendedores</h2>
    </div>

    <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ url('Solicitacoes/MapaVendedores') }}">Solicações</a></li>
                    <li>Mapa de Vendedores</li>
                </ul>
            </div>
        </div>
    </div>

    <div id="listagem" class="grid-m-12 grid-s-12">
        <div class="table-responsive">
            <table id="listaClientes" class="table">
                <thead>
                    <th>Nome</th>
                    <th>Email</th>
                </thead>
                <tbody>
                    <tr>
                        <td>José da Silva</td>
                        <td>jose@gmail.com</td>
                    </tr>
                    <tr>
                        <td>João Souza</td>
                        <td>joao@gmail.com</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@stop