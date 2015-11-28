@extends('layouts.master')


@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    {{--se perfil for de vendedor carregar sidebarVendedor, se for comerciante sidebarComerciante--}}
    @include('layouts.sidebarComerciante')
@stop

@section('content')

    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>Mensagens</h2>
        <p>Você possui <b>{{$numero_novas_mensagens}}</b> nova(s) mensagem(ns).</p>
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
                <th>Hora de envio</th>
                <th>Respondida</th>
                <th></th>
                </thead>
                <tbody>
                    <tr>
                        <td>José da Silva</td>
                        <td>jose@email.com</td>
                        <td>12/11/2015</td>
                        <td>12:20</td>
                        <td>NÃO</td>
                        <td class="col-actions">
                            <a href="{{ url('SuasMensagens/responder/1') }}" title="Responder"><i class="material-icons">reply</i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>José da Silva</td>
                        <td>jose@email.com</td>
                        <td>12/11/2015</td>
                        <td>12:20</td>
                        <td>SIM</td>
                        <td class="col-actions">

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@stop