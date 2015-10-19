@extends('layouts.master')

@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @include('layouts.sidebarSistema')
@stop

@section('content')

    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>Listar Serviços</h2>
    </div>

    <div id="breadcrumbs" class="grid-m-9 grid-s-9 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ route('Servico.index') }}">Serviço</a></li>
                    <li>Listar</li>
                </ul>
            </div>
        </div>
    </div>


    <div class="grid-m-3 grid-s-3 grid-xs-12">
        <a id="btnNovo" class="btn btn-primary ripple" style="margin-top: 25px;" href="{{ route('Servico.create') }}">
            <span class="text-content">Novo</span>
        </a>
    </div>

    <div id="listagem" class="grid-m-12 grid-s-12">
        <div class="table-responsive">
            <table id="listarServicos" class="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Descrição</th>
                </tr>
                </thead>

                <tbody>
                @foreach($servicos as $servico)
                    <tr>
                        <td>{{ $servico->id }}</td>
                        <td>{{ $servico->descricao }}</td>
                        <td class="col-actions">
                            <a href="{{ route('Servico.show', array('id' => $servico->id))}}" title="Detalhar"><i class="material-icons">description</i></a>
                        </td>
                        <td class="col-actions">
                            <a href="{{ route('Servico.edit', array('id' => $servico->id))}}" title="Editar"><i class="material-icons">mode_edit</i></a>
                        </td>
                        <td class="col-actions">
                            <a href="{{ action('ServicoController@destroy', $servico->id)}}" title="Remover"><i class="material-icons">delete</i></a>
                            {{--                            {!! link_to_action('ServicoController@destroy', $title = 'Remover', $parameters = $servico->id, $attributes = array('class' => 'btn btn-primary')) !!}--}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@stop