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

        <!--FOOTER -->
        <footer>
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="grid-m-4 grid-s-6 grid-xs-12">
                            <div class="footer-info">
                                <div class="footer-title text-title">
                                    Links Úteis
                                </div>
                                <div class="footer-link text-caption">
                                    <a href="javascript:void(0);">Sobre</a>
                                </div>
                                <div class="footer-link text-caption">
                                    <a href="javascript:void(0);">Contato</a>
                                </div>
                                <div class="footer-link text-caption">
                                    <a href="javascript:void(0);">Politica de Privacidade</a>
                                </div>
                                <div class="footer-link text-caption">
                                    <a href="javascript:void(0);">Trabalhe Conosco</a>
                                </div>
                            </div>
                        </div>
                        <div class="grid-m-4 grid-s-6 grid-xs-12">
                            <div class="footer-contact">
                                <div class="footer-title text-title">
                                    Veja como entrar em contato
                                </div>
                                <div class="footer-link text-caption" title="Whatsapp">
                                    <img src="http://cdn.flaticon.com/svg/33/33447.svg">
                                    <!-- Whatsapp -->
                                    +55(11)9999-9999
                                </div>
                                <div class="footer-link text-caption" title="Facebook">
                                    <img src="http://cdn.flaticon.com/png/256/59183.png">
                                    <!-- Facebook -->
                                    facebook.com/brasilspot
                                </div>
                                <div class="footer-link text-caption" title="Email">
                                    <img src="http://cdn.flaticon.com/png/256/60381.png">
                                    <!-- Email -->
                                    atendimento@brasilspot.com
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <!-- <div class="container">
                    <div class="row">
                        <div class="credits grid-m-6 grid-s-12">
                            <span>© 2015 All rights reserved.</span>
                        </div>
                        <div class="author grid-m-6 grid-s-12">
                            <a href="https://renanpupin.com" taget="_blank">
                                <span>Renan Pupin</span>
                            </a>
                        </div>
                    </div>
                </div> -->
            </div>
        </footer>
        <!-- <div class="gotop" title="Top">
                <i class="material-icons">keyboard_arrow_up</i>
            </div> -->

        <!-- SCRIPTS SECTION -->
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://www.mattboldt.com/demos/typed-js/js/typed.custom.js"></script>
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/masonry/3.3.1/masonry.pkgd.min.js"></script>
        {{--<script type="text/javascript" src="assets/js/dropdown.js"></script>--}}
        {{--<script type="text/javascript" src="assets/js/script.js"></script>--}}
        <script type="text/javascript" src="{!! asset('assets/js/dropdown.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('assets/js/script.js') !!}"></script>
    </body>
</html>