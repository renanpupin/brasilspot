@extends('layouts.master')

@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @include('layouts.sidebarSistema')
    <!--<p>This is appended to the master sidebar.</p>-->
@stop

@section('content')
    {{--<p>This is my body content.</p>--}}
@stop