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
        <h2>Lista de Comerciantes Cadastrados</h2>
    </div>

    <div id="breadcrumbs" class="grid-m-9 grid-s-9 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ url('comerciantes/gerenciar') }}">Comerciantes</a></li>
                    <li>Gerenciar</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="grid-m-3 grid-s-3 grid-xs-12">
        <a id="btnNovo" class="btn btn-primary ripple" style="margin-top: 25px; margin-bottom: 25px;" href="{{ url('comerciantes/cadastrar') }}">
            <span class="text-content">Novo</span>
        </a>
    </div>

    <div id="listagem" class="grid-m-12 grid-s-12">
        <div class="table-responsive">
            <table id="listaComerciantes" class="table">
                <thead>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Email</th>
                </thead>
                <tbody>
                @foreach($comerciantes as $comerciante)
                    <tr>
                        <td>{{ $comerciante->id }}</td>
                        <td>{{ $comerciante->Usuario->name }}</td>
                        <td>{{ $comerciante->Usuario->email }}</td>
                        {{--<td class="col-actions">--}}
                            {{--<a href="{{ url('Vendedor/VincularMetas/'.$vendedor->id)}}" title="Ver metas"><i class="material-icons">trending_up</i></a>--}}
                        {{--</td>--}}
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop