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
        <h2>Mensagens</h2>
        @if($numero_novas_mensagens == 0)
            <p>Você não possui nova(s) mensagem(ns).</p>
        @endif
        @if($numero_novas_mensagens > 0)
            <p>Você possui <b>{{$numero_novas_mensagens}}</b> nova(s) mensagem(ns).</p>
        @endif
    </div>

    <div id="breadcrumbs" class="grid-m-9 grid-s-9 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ url('SuasMensagens') }}">Suas Mensagens</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="grid-m-3 grid-s-3 grid-xs-12">
        <a id="btnNova" class="btn btn-primary ripple" style="margin-top: 25px; margin-bottom: 25px;" href="{{ url('NovaMensagem') }}">
            <span class="text-content">Nova</span>
        </a>
    </div>

    <div id="listagem" class="grid-m-12 grid-s-12">
        <div class="table-responsive">
            <table id="listaClientes" class="table">
                <thead>
                <th>Remetente</th>
                <th>Email</th>
                <th>Data de envio</th>
                {{--<th>Hora de envio</th>--}}
                <th>Respondida</th>
                <th></th>
                </thead>
                <tbody>
                @foreach($mensagens as $mensagem)
                    <tr>
                        <td>{{ $mensagem->rementente }}</td>
                        <td>{{ $mensagem->Usuario->email }}</td>
                        <td>{{ $mensagem->dataEnvio }}</td>
                        {{--<td>12:20</td>--}}
                        <td>{{ $mensagem->dataRespondida != null ? 'SIM' : 'NÃO' }}</td>
                        <td class="col-actions">
                            <a href="{{ url('SuasMensagens/responder',$mensagem->id) }}" title="Responder"><i class="material-icons">reply</i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop