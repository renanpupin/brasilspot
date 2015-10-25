@extends('layouts.master')

@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @include('layouts.sidebarSite')
@stop

@section('content')

    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>Política de Privacidade</h2>
    </div>

    <div id="politica" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="row">
            <span class="separator"></span>
            texto
        </div>
    </div>

@stop