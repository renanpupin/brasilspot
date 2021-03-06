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
        <h2>Pedidos de Materiais de Propaganda</h2>
    </div>

    <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ url('Solicitacoes/MaterialPropaganda') }}">Solicitações</a></li>
                    <li>Material de Propaganda</li>
                </ul>
            </div>
        </div>
    </div>

    {{--<div class="grid-m-3 grid-s-3 grid-xs-12">--}}
        {{--<a id="btnNovo" class="btn btn-primary ripple" style="margin-top: 25px;" href="{{ url('Solicitacoes/MaterialPropaganda/cadastrar') }}">--}}
            {{--<span class="text-content">Novo</span>--}}
        {{--</a>--}}
    {{--</div>--}}

    <div id="listagem" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="table-responsive">
            <table id="listaClientes" class="table">
                <thead>
                    <th>#</th>
                    <th>Usuário</th>
                    <th>Aceito</th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                @foreach($materiaisPropagandas as $material)
                <tr>
                    <td>{{ $material->id }}</td>
                    <td>{{ $material->Usuario->name }}</td>
                    <td>{{ $material->aceito }}</td>
                    <td class="col-actions">
                        <a href="{{ url('Solicitacoes/MaterialPropaganda',$material->id) }}" title="Detalhar"><i class="material-icons">description</i></a>
                    </td>
                    <td class="col-actions">
                        {!! Form::button('<i class="material-icons">delete</i>', ['title' => 'Remover', 'type' => 'submit', 'class' => 'btnRemove']) !!}
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop