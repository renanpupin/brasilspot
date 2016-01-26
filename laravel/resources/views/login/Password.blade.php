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

    <title>BrasilSpot - Login</title>

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
            <div id="" class="content">
                <div class="login-box">
                    <div class="title">
                        <span class="logo">
                          <img src="{!! asset('assets/img/logo.00_png_srb') !!}">
                        </span>
                        <h1>Recuperar Senha</h1>
                    </div>
                    @if($errors->any())
                        <div class="grid-m-12 grid-s-12 grid-xs-12">
                            <div class="alert alert-danger" role="alert">
                                <button type="button" class="close-alert">×</button>
                                @foreach($errors->all() as $error)
                                    <p><i class="material-icons">error_outline</i>{{ $error }}</p>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    <form id="formLogin" class="form-horizontal" role="form" method="POST" action="{{ route('ResetarPost') }}">
                        {!! csrf_field() !!}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-field">
                            <i class="material-icons" title="Usuário">person</i>
                            {!! Form::text('email',old('email'), ['id' => 'email', 'class' => 'form-control', 'type' => 'email', 'required' => 'required', 'placeholder' => 'Email']) !!}
                        </div>

                        <div class="button-field">
                            <input type="submit" value="Recuperar" title="Recuperar" class="btn btn-primary ripple" id="btnLogin">
                        </div>

                        <div class="forget-password">
                            <span class="info">
                                <i class="material-icons" style="font-size: 14px;">arrow_back</i>
                            </span>
                            <a href="{{ url('Login') }}">Voltar</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- SCRIPTS SECTION -->
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
{{--<script type="text/javascript" src="{!! asset('assets/js/script.js') !!}"></script>--}}
</body>
</html>
