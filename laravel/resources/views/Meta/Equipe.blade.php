@extends('layouts.master')

@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @include('layouts.sidebarVendedor')
@stop

@section('content')

    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>Metas da Equipe</h2>
    </div>

    <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ url('Metas/Equipe') }}">Metas</a></li>
                    <li>Da Equipe</li>
                </ul>
            </div>
        </div>
    </div>


    <div id="listagem" class="grid-m-12 grid-s-12">
        <p>Atualmente você não possui metas de equipe.</p>
    </div>
@stop