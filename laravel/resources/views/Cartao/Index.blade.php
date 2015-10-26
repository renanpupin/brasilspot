@extends('layouts.master')

@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @include('layouts.sidebarSistema')
@stop

@section('content')

    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>Listar Cartões</h2>
    </div>

    <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ route('Cartao.index') }}">Cartão</a></li>
                    <li>Cadastrar</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="grid-m-3 grid-s-3 grid-xs-12">
        <a id="btnNovo" class="btn btn-primary ripple" style="margin-top: 25px;" href="{{ url('Cartao/cadastrar') }}">
            <span class="text-content">Novo</span>
        </a>
    </div>

    <div id="listagem" class="grid-m-12 grid-s-12">
        <div class="table-responsive">
            <table id="listaEmpresas" class="table">
                <thead>
                <th>Id</th>
                <th>Bandeira</th>
                <th>Tipo</th>
                <th></th>
                <th></th>
                <th></th>
                </thead>
                <tbody>
                @foreach($cartoes as $cartao)
                    <tr>
                        <td>{{ $cartao->id }}</td>
                        <td>{{ $cartao->bandeira }}</td>
                        <td>{{ $cartao->tipo }}</td>
                        <td class="col-actions">
                            <a href="{{ route('Cartao.show', array('id' => $cartao->id))}}" title="Detalhar"><i class="material-icons">description</i></a>
                        </td>
                        <td class="col-actions">
                            <a href="{{ url('Cartao/editar', [$cartao->id]) }}" title="Editar"><i class="material-icons">mode_edit</i></a>
                        </td>
                        <td class="col-actions">
                            {!! Form::open([
                                'method' => 'DELETE',
                                'route' => ['Cartao.destroy', $cartao->id]
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
@endsection