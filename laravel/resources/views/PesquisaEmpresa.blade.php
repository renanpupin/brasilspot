<!DOCTYPE html>
<html lang="EN">
    <head>
        <!--CUSTOM META TAGS-->
        <meta charset="utf-8"/>
        <meta name="robots" content="index, follow">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' />
        <meta name="description" content="BrasilSpot">
        <meta name="keywords" content="BrasilSpot">
        <meta name="author" content="Renan Pupin">
        <!--END OF CUSTOM META TAGS-->

        <title>BrasilSpot - @yield('title')</title>

        <!--STYLES-->
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <!-- <link rel="shortcut icon" type="image/png" href="assets/images/favicon.png"> -->

        <link href="{!! asset('assets/css/style.css') !!}" media="all" rel="stylesheet" type="text/css" />
        <!--END OF STYLES-->

    </head>
    <body id="home">
        <!--OVERLAY -->
        <div class="overlay" style="display: none;"></div>

        <!--LOADER -->
        <div id="loader" style="display: none;">
            <img src="{!! asset('assets/img/logo.00_png_srb') !!}">
            <div class="loader-text">Carregando...</div>
        </div>

        <div class="floatingButton">
            <a href="{{url('Planos')}}" id="" class="btn btn-assinar ripple">
                <i class="material-icons">assignment_turned_in</i> <span class="text-content">Assinar</span>
            </a>
            <a href="{{url('Login')}}" id="" class="btn btn-login ripple">
                <i class="material-icons">person</i> <span class="text-content">Login</span>
            </a>
        </div>

        <!--BODY CONTENT -->
        <div class="body-content">
            <div class="body-wrapper">
                <div id="intro">
                    <div class="container">
                        <div class="row">

                            <div class="logo grid-m-6 grid-m-offset-3 grid-s-12 grid-xs-12">
                                <img src="{!! asset('assets/img/logo_final.png') !!}">
                            </div>

                            <div class="intro-form grid-m-4 grid-m-offset-4 grid-s-6 grid-s-offset-3 grid-xs-12">
                                <div class="row">
                                    {{--<form id="formLocation" method="post" action="{{ url('Empresas/Buscar' )}}">--}}
                                    {!! Form::Open(['url' => 'Empresas', 'method' => 'GET']) !!}

                                            <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                                                <label for="pesquisaEmpresa">Eu procuro</label>
                                                <input type="text" name="pesquisaEmpresa" id="pesquisaEmpresa" placeholder="O que você procura?">
                                                <p class="input-hint">
                                                    (Restaurante, bar, loja, etc.)
                                                </p>
                                            </div>
                                            <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                                                <label for="pesquisaEndereco">Onde?</label>
                                                <input type="text" name="pesquisaEndereco" id="pesquisaEndereco" placeholder="Rio de Janeiro, RJ">
                                                <p class="input-hint">
                                                    (Um endereço específico, bairro ou cidade.)
                                                </p>
                                            </div>
                                            <div class="form-group grid-m-6 grid-m-offset-3 grid-s-6 grid-s-offset-3 grid-xs-12 button-field">
                                                {!! Form::button('<i class="material-icons">send</i> <span class="text-content">Encontre</span>',[
                                                'id' => 'btnBuscar',
                                                'type' => 'submit',
                                                'class' => 'btn btn-primary ripple'
                                                ])!!}
                                            </div>
                                    {!! Form::Close() !!}
                                    {{--</form>--}}
                                </div>

                                <div class="row">
                                    <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                                        <a href="{{ url('Categorias' )}}" id="verCategorias" class="sublink">
                                            <span class="text-content">Veja todas as categorias</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--<div class="floatingButton" title="Login">--}}
            {{--<a href="{{ url('Login' )}}">--}}
                {{--<i class="material-icons">person</i>--}}
            {{--</a>--}}
        {{--</div>--}}

        {{--<span class="separator"></span>--}}

        @extends('layouts.footer')

        <!-- SCRIPTS SECTION -->
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript" src="{!! asset('assets/js/modal.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('assets/js/jquery.autocomplete.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('assets/js/dropdown.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('assets/js/script.js') !!}"></script>
        @yield('scripts')
    </body>
</html>