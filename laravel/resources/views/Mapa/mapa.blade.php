@extends('layouts.master')

@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @include('layouts.sidebarVendedor')
@stop

@section('content')

    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>Mapa Spot</h2>
    </div>

    <div id="map" class="grid-m-12 grid-s-12 grid-xs-12">
        <img src="https://daniel9morris.files.wordpress.com/2012/04/1.png" style="width: 100%; margin-top: 20px;">
    </div>

@stop

@section('scripts')
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3&amp;sensor=false"></script>
    <script type="text/javascript" src="{!! asset('assets/js/mapa/mapa.js') !!}"></script>
@stop