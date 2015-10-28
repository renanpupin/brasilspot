@extends('layouts.master')

@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @include('layouts.sidebarSistema')
@stop

@section('content')

    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>Gerenciar Clientes</h2>
    </div>

    <div id="breadcrumbs" class="grid-m-9 grid-s-9 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ url('Clientes/Gerenciar') }}">Clientes</a></li>
                    <li>Gerenciar</li>
                </ul>
            </div>
        </div>
    </div>


    <div class="grid-m-3 grid-s-3 grid-xs-12">
        <a id="btnNovo" class="btn btn-primary ripple" style="margin-top: 25px;" href="{{ url('Clientes/cadastrar') }}">
            <span class="text-content">Novo</span>
        </a>
    </div>

    <div id="listagem" class="grid-m-12 grid-s-12">
        <div class="table-responsive">
            <table id="listaClientes" class="table">
                <thead>
                <th>#</th>
                <th>Nome</th>
                <th>Plano</th>
                <th>Vencimento</th>
                <th></th>
                <th></th>
                <th></th>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Nome</td>
                        <td>PRO</td>
                        <td>21/11/2015</td>
                        <td class="col-actions">
                            <a href="{{ url('Clientes/1') }}" title="Detalhar"><i class="material-icons">description</i></a>
                        </td>
                        <td class="col-actions">
                            <a href="{{ url('Clientes/editar/1') }}" title="Editar"><i class="material-icons">mode_edit</i></a>
                        </td>
                        <td class="col-actions">
                            {!! Form::button('<i class="material-icons">delete</i>', ['title' => 'Remover', 'type' => 'submit', 'class' => 'btnRemove']) !!}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@stop