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
        <h2>Listar Endereços</h2>
    </div>

    <div id="breadcrumbs" class="grid-m-9 grid-s-9 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ route('Categoria.index') }}">Endereço</a></li>
                    <li>Listar</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="grid-m-3 grid-s-3 grid-xs-12">
        <a id="btnNovo" class="btn btn-primary ripple" style="margin-top: 25px; margin-bottom: 25px;" href="{{ url('Endereco/cadastrar') }}">
            <span class="text-content">Novo</span>
        </a>
    </div>

    @if(Session::has('flash_message'))
        <div class="grid-m-12 grid-s-12 grid-xs-12">
            <div class="alert alert-success" role="alert">
                <button type="button" class="close-alert">×</button>
                <i class="material-icons">done</i>
                {{ Session::get('flash_message') }}
            </div>
        </div>
    @endif
    @if($errors->any())
        <div class="grid-m-12 grid-s-12 grid-xs-12">
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close-alert">×</button>
                @foreach($errors->all() as $error)
                    <p><i class="material-icons">error_outline</i>{{ $error }}</p>
                @endforeach
            </div>
        </div>
    @endif

    <div id="listagem" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="table-responsive">
            <table id="listarEnderecos" class="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Endereço</th>
                    <th>Bairro</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>Cordenadas</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                @foreach($enderecos as $endereco)
                    <tr>
                        <td>{{ $endereco->id }}</td>
                        <td>{{ $endereco->endereco }}</td>
                        <td>{{ $endereco->bairro }}</td>
                        <td>{{ $endereco->cidade }}</td>
                        <td>{{ $endereco->estado }}</td>
                        <td>{{ $endereco->cordenadasLatlon }}</td>
                        <td class="col-actions">
                            <a href="{{ route('Categoria.show', array('id' => $endereco->id))}}" title="Detalhar"><i class="material-icons">description</i></a>
                        </td>
                        <td class="col-actions">
                            <a href="{{ url('Categoria/editar', [$endereco->id]) }}" title="Editar"><i class="material-icons">mode_edit</i></a>
                        </td>
                        <td class="col-actions">
                            {!! Form::open([
                                'method' => 'DELETE',
                                'route' => ['Endereco.destroy', $endereco->id]
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

@section('scripts')
    <script type="text/javascript" src="{!! asset('assets/js/categoria/categoria.js') !!}"></script>
@stop