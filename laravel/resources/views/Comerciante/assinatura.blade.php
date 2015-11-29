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
        <p>No momento você possui <b>2</b> assinaturas. Para adicionar mais assinaturas clique <a href="{{url('http://pagar.me')}}" target="_blank">AQUI</a>.</p>
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
                    <tr>
                        <td>Assinatura 1</td>
                        <td>Pro</td>
                        <td>05/10/2015</td>
                        <td>05/11/2015</td>
                        <td class="col-actions">
                             <a href="{{url('SuaAssinatura/Downgrade/1')}}" class="btn">Downgrade</a>
                        </td>
                        <td class="col-actions">
                            <a href="{{ url('SuaAssinatura/Cancelar', array('id' => 1))}}" title="Cancelar Assinatura" class="btn btn-cancel">Cancelar</a>
                            {{--ao clicar aqui, informar ao usuário que ele perderá a assinatura se ele continuar--}}
                            {{--pedir para ele infomar a senha novamente--}}
                        </td>
                    </tr>
                    <tr>
                        <td>Assinatura 2</td>
                        <td>Básico</td>
                        <td>03/11/2015</td>
                        <td>03/12/2015</td>
                        <td class="col-actions">
                            <a href="{{url('SuaAssinatura/Upgrade/1')}}" class="btn btn-primary">Upgrade</a>
                        </td>
                        <td class="col-actions">
                            <a href="{{ url('SuaAssinatura/Cancelar', array('id' => 2))}}" title="Cancelar Assinatura" class="btn btn-cancel">Cancelar</a>
                            {{--ao clicar aqui, informar ao usuário que ele perderá a assinatura se ele continuar--}}
                            {{--pedir para ele infomar a senha novamente--}}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@stop