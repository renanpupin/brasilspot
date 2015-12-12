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
        <h2>Mapa de Vendedores</h2>
    </div>

    <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ url('Vendedor/MapaVendedores') }}">Vendedores</a></li>
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
                    <th>Metas</th>
                </thead>
                <tbody>
                @foreach($vendedores as $vendedor)
                    <tr>
                        <td>{{ $vendedor->name }}</td>
                        <td>{{ $vendedor->email }}</td>
                        <td class="col-actions">
                            <a href="{{ url('Vendedor/VincularMetas/'.$vendedor->id)}}" title="Ver metas"><i class="material-icons">trending_up</i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop