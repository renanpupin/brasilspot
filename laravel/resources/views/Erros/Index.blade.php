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
        <h2>Lista de Erros</h2>
    </div>

    @can('AcessoAdministrador')
        <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
    @endcan
    @can('AcessoVendedor')
    <div id="breadcrumbs" class="grid-m-9 grid-s-9 grid-xs-12">
    @endcan
    @can('AcessoComerciante')
        <div id="breadcrumbs" class="grid-m-9 grid-s-9 grid-xs-12">
    @endcan
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ url('Erros') }}">Erros</a></li>
                    <li>Listar</li>
                </ul>
            </div>
        </div>
    </div>

    @can('AcessoVendedor')
    <div class="grid-m-3 grid-s-3 grid-xs-12">
        <a id="btnNovo" class="btn btn-primary ripple" style="margin-top: 25px;" href="{{ url('Solicitacoes/ReportarErro/cadastrar') }}">
            <span class="text-content">Novo</span>
        </a>
    </div>
    @endcan

    @can('AcessoComerciante')
    <div class="grid-m-3 grid-s-3 grid-xs-12">
        <a id="btnNovo" class="btn btn-primary ripple" style="margin-top: 25px;" href="{{ url('Solicitacoes/ReportarErro/cadastrar') }}">
            <span class="text-content">Novo</span>
        </a>
    </div>
    @endcan

    <div id="listagem" class="grid-m-12 grid-s-12">
        <div class="table-responsive">
            <table id="listaClientes" class="table">
                <thead>
                <th>#</th>
                <th>Usuário</th>
                <th>Corrigido</th>
                <th></th>
                <th></th>
                </thead>
                <tbody>
                @foreach($erros as $erro)
                <tr>
                    <td>{{ $erro->id }}</td>
                    <td>{{ $erro->Usuario->name }}</td>
                    @if($erro->isCorrigido)
                        <td>SIM</td>
                    @endif
                    @if(!$erro->isCorrigido)
                        <td>NÃO</td>
                    @endif

                    <td class="col-actions">
                        <a href="{{ url('Erros',[$erro->id])}}" title="Detalhar"><i class="material-icons">description</i></a>
                    </td>
                    <td class="col-actions">
                        {!! Form::open([
                               'method' => 'DELETE',
                               'route' => ['Erro.destroy', $erro->id]
                           ]) !!}
                        {!! Form::button('<i class="material-icons">delete</i>', ['title' => 'Remover', 'type' => 'submit', 'class' => 'btnRemove']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop