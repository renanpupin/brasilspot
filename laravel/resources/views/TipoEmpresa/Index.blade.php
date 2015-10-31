@extends('layouts.master')

@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @include('layouts.sidebarSistema')
@stop

@section('content')

    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>Listar Tipos Empresas</h2>
    </div>

    <div id="breadcrumbs" class="grid-m-9 grid-s-9 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ route('TipoEmpresa.index') }}">Tipos Empresas</a></li>
                    <li>Listar</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="grid-m-3 grid-s-3 grid-xs-12">
        <a id="btnNovo" class="btn btn-primary ripple" style="margin-top: 25px; margin-bottom: 25px;" href="{{ url('TipoEmpresa/cadastrar') }}">
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
            <table id="listarTiposEmpresas" class="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Tipo</th>
                </tr>
                </thead>

                <tbody>
                @foreach($tiposEmpresas as $tipoEmpresa)
                    <tr>
                        <td>{{ $tipoEmpresa->id }}</td>
                        <td>{{ $tipoEmpresa->tipo }}</td>
                        <td class="col-actions">
                            <a href="{{ route('TipoEmpresa.show', array('id' => $tipoEmpresa->id))}}" title="Detalhar"><i class="material-icons">description</i></a>
                        </td>
                        <td class="col-actions">
                            <a href="{{ url('TipoEmpresa/editar', [$tipoEmpresa->id]) }}" title="Editar"><i class="material-icons">mode_edit</i></a>
                        </td>
                        <td class="col-actions">
                            {!! Form::open([
                                'method' => 'DELETE',
                                'route' => ['TipoEmpresa.destroy', $tipoEmpresa->id]
                            ]) !!}
                            {!! Form::button('<i class="material-icons">delete</i>', ['title' => 'Remover', 'type' => 'submit', 'class' => 'btnRemove']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                <div class="row">
                    <div class="col-md-12">
                        {!! $tiposEmpresas->render() !!}
                    </div>
                </div>
                </tbody>
            </table>

        </div>
    </div>

@stop

@section('scripts')
    <script type="text/javascript" src="{!! asset('assets/js/servico/servico.js') !!}"></script>
@stop