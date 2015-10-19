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

    @include('layouts.breadcrumbs')


    <div class="grid-m-3 grid-s-3 grid-xs-12">
        <a id="btnNovo" class="btn btn-primary ripple" style="margin-top: 25px;" href="{{ route('Empresa.create') }}">
            <span class="text-content">Novo</span>
        </a>
    </div>

    <div id="listagem" class="grid-m-12 grid-s-12">
        <div class="table-responsive">
            <table id="listaEmpresas" class="table">
        <thead>
            <th>#</th>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Plano</th>
            <th>Empreendimento</th>
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
                    {{--<a href="#" title="Deletar"><i class="material-icons">delete</i></a>--}}
                    <a href="{{ route('Empresa.create') }}" title="Deletar"><i class="material-icons">delete</i></a>
                </td>
                <td class="col-actions">
                    <a href="#" title="Editar"><i class="material-icons">mode_edit</i></a>
                </td>
                <td class="col-actions">
                    <a href="#" title="Detalhar"><i class="material-icons">description</i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
        </div>
    </div>
@stop