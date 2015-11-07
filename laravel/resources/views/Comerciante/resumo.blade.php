@extends('layouts.master')

@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @include('layouts.sidebarComerciante')
@stop

@section('content')

    <div id="dashboard" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="dashboard-header row">
            <div class="feature-empresa grid-m-4 grid-s-12 grid-xs-12">
                <img class="feature-empresa-image" src="http://lorempixel.com/600/400" alt="" />
            </div>
            <div class="grid-m-8 grid-s-12 grid-xs-12">
                <h3>Nome Fantasia</h3>
                <p>Razão Social</p>
                <p>Slogan Slogan Slogan Slogan Slogan Slogan </p>
                <div class="row" style="margin-bottom: 20px;">
                    <div class="grid-m-6 grid-s-6 grid-xs-6">
                        <a href="{{url('SuaEmpresa/Editar')}}" class="btn btn-editar ripple">
                            <i class="material-icons">mode_edit</i>
                            <span class="text-content">Editar</span>
                        </a>
                    </div>
                    <div class="grid-m-6 grid-s-6 grid-xs-6">
                        <a href="{{url('SuaEmpresa')}}" class="btn btn-visualizar ripple">
                            <i class="material-icons">info_outline</i>
                            <span class="text-content">Visualizar</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboard-resumo-titulo row">
            <div class="grid-m-12 grid-s-12 grid-xs-12">
                <h4>Resumo</h4>
            </div>
        </div>
        <div class="dashboard-resumo row">
            <div class="grid-m-12 grid-s-12 grid-xs-12">
                <div class="row">
                    <div class="resumo-item grid-m-4 grid-s-4 grid-xs-4" style="color: #AECC1A;">
                        <a href="#">
                            <i class="material-icons">visibility</i><span class="resumo-item-info">15</span>
                        </a>
                        <p>Visualizações</p>
                    </div>
                    <div class="resumo-item grid-m-4 grid-s-4 grid-xs-4" style="color: #E66D1C;">
                        <a href="#">
                            <i class="material-icons">mail</i><span class="resumo-item-info">5</span>
                        </a>
                        <p>Mensagens</p>
                    </div>
                    <div class="resumo-item grid-m-4 grid-s-4 grid-xs-4" style="color: #2269AB;">
                        <a href="#">
                            <i class="material-icons">assignment</i><span class="resumo-item-info">Pro</span>
                        </a>
                        <p>Assinatura</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop