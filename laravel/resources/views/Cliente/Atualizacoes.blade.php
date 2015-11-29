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
        <h2>Atualizações de seus clientes</h2>
    </div>

    <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ url('Clientes/Gerenciar') }}">Clientes</a></li>
                    <li>Atualização</li>
                </ul>
            </div>
        </div>
    </div>

    <div id="listagem" class="grid-m-12 grid-s-12">
        <div class="table-responsive">
            <table id="listaClientes" class="table">
                <thead>
                    <th>Cliente</th>
                    <th>Email</th>
                    <th>Data de envio</th>
                    <th>Hora de envio</th>
                    <th>Situação</th>
                    <th></th>
                </thead>
                <tbody>
                    <tr>
                        <td>José da Silva</td>
                        <td>jose@email.com</td>
                        <td>12/11/2015</td>
                        <td>12:20</td>
                        <td>Pendente</td>
                        <td class="col-actions">
                            <a href="{{ url('Clientes/VerAtualizacao/1') }}" title="Visualizar"><i class="material-icons">description</i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Maria Silva</td>
                        <td>maria@email.com</td>
                        <td>06/11/2015</td>
                        <td>16:45</td>
                        <td>Aprovada</td>
                        <td class="col-actions">
                            <a href="{{ url('Clientes/VerAtualizacao/1') }}" title="Visualizar"><i class="material-icons">description</i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>João Souza</td>
                        <td>joao@email.com</td>
                        <td>02/11/2015</td>
                        <td>05:21</td>
                        <td>Reprovada</td>
                        <td class="col-actions">
                            <a href="{{ url('Clientes/VerAtualizacao/1') }}" title="Visualizar"><i class="material-icons">description</i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@stop