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
                <th style="text-align: center;">Atualizar Vencimento</th>
                <th></th>
                <th></th>
                <th></th>
                </thead>
                <tbody>
                @foreach($comerciantes as $comerciante)
                    <tr>
                        <td>{{ $comerciante->Usuario->id }}</td>
                        <td>{{ $comerciante->Usuario->name }}</td>
                        @if($comerciante->AssinaturaComerciante != null)
                            <td>{{ $comerciante->AssinaturaComerciante->Assinatura->Plano->nome }}</td>
                            <td>{{ $comerciante->AssinaturaComerciante->Assinatura->dataVencimento }} </td>
                        @endif
                        @if($comerciante->AssinaturaComerciante == null)
                            <td>Não Possui Assinatura</td>
                            <td>Não Possui Assinatura</td>
                        @endif
                        <td class="col-actions currency">
                            <a href="{{ url('Clientes/AtualizarVencimento',$comerciante->Usuario->id) }}" title="Atualizar Vencimento"><i class="material-icons">attach_money</i></a>
                        </td>
                        <td class="col-actions">
                            <a href="{{ url('Clientes',$comerciante->Usuario->id) }}" title="Detalhar"><i class="material-icons">description</i></a>
                        </td>
                        <td class="col-actions">
                            <a href="{{ url('Clientes/editar',$comerciante->Usuario->id) }}" title="Editar"><i class="material-icons">mode_edit</i></a>
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