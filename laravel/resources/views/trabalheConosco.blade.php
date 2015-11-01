@extends('layouts.masterSiteSemSidebar')

@section('title', 'Bem vindo!')

@section('navbar')
    @parent
    @include('layouts.navbarSite')
@stop

@section('content')

    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>Trabalhe Conosco</h2>
    </div>
    <div class="content-slogan grid-m-12 grid-s-12 grid-xs-12">
        <h5>Trabalhe...</h5>
    </div>
    {{--<span class="separator"></span>--}}


    <div class="content-slogan grid-m-12 grid-s-12 grid-xs-12">
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
    </div>

@stop