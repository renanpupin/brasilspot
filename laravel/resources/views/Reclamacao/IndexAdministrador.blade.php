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
        <h2>Reclamações</h2>
    </div>

    <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ url('Vendedor/Reclamacoes') }}">Vendedores</a></li>
                    <li>Reclamações</li>
                </ul>
            </div>
        </div>
    </div>

    <div id="listagem" class="grid-m-12 grid-s-12">
        <div class="table-responsive">
            <table id="listaClientes" class="table">
                <thead>
                <th>#</th>
                <th>Usuário</th>
                <th>Visualizada</th>
                <th></th>
                <th></th>
                </thead>
                <tbody>
                @foreach($reclamacoes as $reclamacao)
                    <tr>
                        <td>{{ $reclamacao->id }}</td>
                        <td>{{ $reclamacao->Usuario->name }}</td>
                        @if($reclamacao->isVisualizada)
                            <td>SIM</td>
                        @endif

                        @if(!$reclamacao->isVisualizada)
                            <td>NÃO</td>
                        @endif

                        <td class="col-actions">
                            <a href="{{ url('Vendedor/Reclamacoes',[$reclamacao->id]) }}" title="Detalhar"><i class="material-icons">description</i></a>
                        </td>
                        <td class="col-actions">
                            {!! Form::open([
                                'method' => 'DELETE',
                                'route' => ['Reclamacao.destroy', $reclamacao->id]
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