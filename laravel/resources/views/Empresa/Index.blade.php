@extends('layouts.master')

@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @include('layouts.sidebarSistema')
@stop

@section('content')

    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>Listar Empresas</h2>
    </div>

    <div id="breadcrumbs" class="grid-m-9 grid-s-9 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ route('Empresa.index') }}">Empresa</a></li>
                    <li>Cadastrar</li>
                </ul>
            </div>
        </div>
    </div>


    <div class="grid-m-3 grid-s-3 grid-xs-12">
        <a id="btnNovo" class="btn btn-primary ripple" style="margin-top: 25px;" href="{{ url('Empresa/cadastrar') }}">
            <span class="text-content">Novo</span>
        </a>
    </div>

    <div id="listagem" class="grid-m-12 grid-s-12">
        <div class="table-responsive">
            <table id="listaEmpresas" class="table">
        <thead>
            <th>#</th>
            <th>Nome</th>
            <th>Plano</th>
            <th>Categoria</th>
            <th>Tipo</th>
            <th>Atende em casa</th>
            <th></th>
            <th></th>
            <th></th>
        </thead>
        <tbody>
        @foreach($empresas as $empresa)
            <tr>
                <td>id</td>
                <td>{{ $empresa->NomeEmpreendedor }}</td>
                <td>{{ $empresa->RazaoSocial }}</td>
                <td>{{ $empresa->NomeFantasia }}</td>
                <td>
                    <i class="material-icons" title="Comércio">store</i>Comércio
                    <!-- <i class="material-icons" title="Serviço">work</i>
                         <i class="material-icons" title="Atração">mood</i> -->
                </td>
                <td>
                    <i class="material-icons">thumb_up</i>Sim
                </td>
                <td class="col-actions">
                    <a href="{{ route('Empresa.show', array('id' => $empresa->id))}}" title="Detalhar"><i class="material-icons">description</i></a>
                </td>
                <td class="col-actions">
                    <a href="{{ url('Empresa/editar', [$empresa->id]) }}" title="Editar"><i class="material-icons">mode_edit</i></a>
                </td>
                <td class="col-actions">
                    {!! Form::open([
                        'method' => 'DELETE',
                        'route' => ['Empresa.destroy', $empresa->id]
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