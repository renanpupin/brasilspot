@extends('layouts.master')

@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @include('layouts.sidebarComerciante')
@stop

@section('content')

    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>Assinatura</h2>
        <p>No momento você possui <b>1</b> assinaturas. Para adicionar mais assinaturas clique <a href="{{url('http://pagar.me')}}" target="_blank">AQUI</a>.</p>

        {{--exibe um dos dois abaixo, o plano é um só, mas pode ter várias assinaturas--}}
        <p>Se desejar mudar seu plano para <b>Basico</b> clique <a href="{{url('DowngradePlano/1')}}" target="_blank">AQUI</a>.</p>
        <p>Se desejar mudar seu plano para <b>Pro</b> clique <a href="{{url('UpgradePlano/1')}}" target="_blank">AQUI</a>.</p>
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
                <th>Empresa</th>
                <th>Vencimento</th>
                <th></th>
                </thead>
                <tbody>
                    <tr>
                        <td>Assinatura 1</td>
                        <td>Imobiliaria Brasil</td>
                        <td>20/11/2015</td>
                        <td class="col-actions">
                            <a href="{{ url('Assinatura.cancelar', array('id' => 1))}}" title="Cancelar Assinatura"><i class="material-icons">delete</i></a>
                            {{--ao clicar aqui, informar ao usuário que ele perderá a assinatura se ele continuar--}}
                            {{--pedir para ele infomar a senha novamente--}}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@stop