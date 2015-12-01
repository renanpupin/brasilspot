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
        <h2>Assinatura</h2>
        @if($qtdAssinaturas > 0 )
            <p>No momento você possui <b>{{$qtdAssinaturas}}</b> assinatura(s). Para adicionar mais assinaturas clique <a href="{{url('http://pagar.me')}}" target="_blank">AQUI</a>.</p>
        @endif
        @if($qtdAssinaturas == 0 )
            <p>No momento você não tem nenhuma assinatura. Se deseja adicionar mais assinaturas clique <a href="{{url('http://pagar.me')}}" target="_blank">AQUI</a>.</p>
        @endif
    </div>

    <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ url('SuaAssinatura') }}">Sua Assinatura</a></li>
                    <li>Listar</li>
                </ul>
            </div>
        </div>
    </div>

    <div id="listagem" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="table-responsive">
            <table id="listarAssinaturas" class="table">
                <thead>
                    <th>#</th>
                    <th>Plano</th>
                    <th>Ativa desde</th>
                    <th>Vencimento</th>
                    <th style="min-width: 175px; width: 175px;"></th>
                    <th style="min-width: 175px; width: 175px;"></th>
                </thead>
                <tbody>
                <input hidden value="{{ $numFilial = 1 }}"/>
                @foreach($assinaturasComerciante as $assinaturaComerciante)
                    <tr>
                        <td>Assinatura {{ $numFilial++ }}</td>
                        <td>{{ $assinaturaComerciante->Assinatura->Plano->nome }}</td>
                        <td>{{ date('d/m/Y',strtotime($assinaturaComerciante->Assinatura->updated_at)) }}</td>
                        <td>{{ date('d/m/Y',strtotime($assinaturaComerciante->Assinatura->dataVencimento)) }}</td>
                        <td class="col-actions">
                             <a href="{{url('SuaAssinatura/Downgrade',$assinaturaComerciante->Assinatura->id)}}" class="btn">Downgrade</a>
                        </td>
                        <td class="col-actions">
                            <a href="{{ url('SuaAssinatura/Cancelar', $assinaturaComerciante->Assinatura->id)}}" title="Cancelar Assinatura" class="btn btn-cancel">Cancelar</a>
                            {{--ao clicar aqui, informar ao usuário que ele perderá a assinatura se ele continuar--}}
                            {{--pedir para ele infomar a senha novamente--}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop