@extends('layouts.master')

@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @can('AcessoVendedor')
    @include('layouts.sidebarVendedor')
    @endcan
    @can('AcessoAdministrador')
    @include('layouts.sidebarAdmin')
    @endcan
@stop

@section('content')

    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>Mapa Spot</h2>
        <p>Veja as empresas que já fazem parte do BrasilSpot</p>
    </div>

    <input type="hidden" id="markers" value="{{$markers}}">

    <div class="grid-m-12 grid-s-12 grid-xs-12">
        <div id="map" style="width: 100%; height: 500px;"></div>
    </div>

@stop

@section('script')
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script type="text/javascript" src="{!! asset('assets/js/mapa/mapa.js') !!}"></script>
@stop