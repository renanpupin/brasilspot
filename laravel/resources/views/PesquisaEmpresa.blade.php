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

                <div class="inline-logo grid-m-6 grid-m-offset-3 grid-s-12 grid-xs-12">
                    <img src="{!! asset('assets/img/logo.00_png_srb') !!}">
                </div>
                <div class="inline-logo-text grid-m-6 grid-m-offset-3 grid-s-12 grid-xs-12">
                    <span class="brasil">BRASIL</span>

                    <span class="spot">SPOT</span>
                </div>

                <div class="intro-form grid-m-6 grid-m-offset-3 grid-s-12 grid-xs-12">
                    <form id="formLocation">
                        <div class="row">
                            <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                                <label for="selecionarEstado">Estado</label>
                                <select id="selecionarEstado" name="selecionarEstado" required>
                                    <option value="-1">Selecione o estado</option>
                                    <option value="AC">Acre</option>
                                    <option value="AL">Alagoas</option>
                                    <option value="AP">Amapá</option>
                                    <option value="AM">Amazonas</option>
                                    <option value="BA">Bahia</option>
                                    <option value="CE">Ceará</option>
                                    <option value="DF">Distrito Federal</option>
                                    <option value="ES">Espirito Santo</option>
                                    <option value="GO">Goiás</option>
                                    <option value="MA">Maranhão</option>
                                    <option value="MS">Mato Grosso do Sul</option>
                                    <option value="MT">Mato Grosso</option>
                                    <option value="MG">Minas Gerais</option>
                                    <option value="PA">Pará</option>
                                    <option value="PB">Paraíba</option>
                                    <option value="PR">Paraná</option>
                                    <option value="PE">Pernambuco</option>
                                    <option value="PI">Piauí</option>
                                    <option value="RJ">Rio de Janeiro</option>
                                    <option value="RN">Rio Grande do Norte</option>
                                    <option value="RS">Rio Grande do Sul</option>
                                    <option value="RO">Rondônia</option>
                                    <option value="RR">Roraima</option>
                                    <option value="SC">Santa Catarina</option>
                                    <option value="SP">São Paulo</option>
                                    <option value="SE">Sergipe</option>
                                    <option value="TO">Tocantins</option>
                                </select>
                            </div>
                            <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                                <label for="selecionarCidade">Cidade</label>
                                <select id="selecionarCidade" name="selecionarCidade" required>
                                    <option value="-1">Selecione a cidade</option>
                                    <option value="1">Cidade 1</option>
                                    <option value="2">Cidade 2</option>
                                    <option value="3">Cidade 3</option>
                                </select>
                            </div>
                            <div class="form-group grid-m-12 grid-s-12 grid-xs-12">
                                <label for="selecionarBairro">Bairro</label>
                                <select id="selecionarBairro" name="selecionarBairro" required>
                                    <option value="-1">Selecione o bairro</option>
                                    <option value="1">Bairro 1</option>
                                    <option value="2">Bairro 2</option>
                                    <option value="3">Bairro 3</option>
                                </select>
                            </div>
                            <div class="form-group grid-m-12 grid-s-12 grid-xs-12 button-field">
                                <a href="{{ url('Empresas' )}}" id="btnEncontre" class="btn btn-primary ripple" type="button">
                                    <i class="material-icons">send</i> <span class="text-content">Encontre</span>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
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