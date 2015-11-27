@extends('layouts.masterSiteSemSidebar')

@section('title', 'Bem vindo!')

@section('navbar')
    @parent
    @include('layouts.navbarSite')
@stop

@section('content')

    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>
            Categorias
        </h2>
    </div>

    <div id="categorias" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="lista-categorias row">
            @foreach($categorias as $categoria)
                <div class="item-categoria grid-m-4 grid-s-6 grid-xs-12">
                    <a href="{{url('categorias/'.str_slug($categoria, "-"))}}">{{ $categoria }}</a>
                </div>
            @endforeach
        </div>
    </div>

@stop