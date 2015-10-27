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

        <!--BODY CONTENT -->
        <div class="body-content">
            <div class="body-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="grid-xs-12 grid-s-12 grid-m-3 ">
                            @section('sidebar')
                            @show
                        </div>
                        <div class="grid-m-9 grid-s-12 grid-xs-12">
                            <div id="content">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <span class="separator"></span>

        @extends('layouts.footer')

        <!-- <div class="gotop" title="Top">
                <i class="material-icons">keyboard_arrow_up</i>
            </div> -->

        <div id="modal" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <button id="modalClose" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id=""></h4>
                    </div>

                    <div class="modal-body"></div>

                    <div class="modal-footer"></div>

                </div>
            </div>
        </div>

        <!-- SCRIPTS SECTION -->
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript" src="{!! asset('assets/js/modal.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('assets/js/dropdown.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('assets/js/script.js') !!}"></script>
        @yield('scripts')
    </body>
</html>