@extends('layouts.master')

@section('title', 'Pagamento!')

@section('sidebar')
    @parent
    @can('AcessoComerciante')
    @include('layouts.sidebarComerciante')
    @endcan
    @can('AcessoVendedor')
    @include('layouts.sidebarVendedor')
    @endcan
    @can('AcessoAdministrador')
    @include('layouts.sidebarAdmin')
    @endcan
@stop

@section('content')

    <div class="content-title grid-m-12 grid-s-12 grid-xs-12">
        <h2>Pagar Assinaturas</h2>
    </div>

    <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ url('assinaturas/adicionar') }}">Assinaturas</a></li>
                    <li>Pagar</li>
                </ul>
            </div>
        </div>
    </div>

    @if(Session::has('flash_message'))
        <div class="grid-m-12 grid-s-12 grid-xs-12">
            <div class="alert alert-success" role="alert">
                <button type="button" class="close-alert">×</button>
                <i class="material-icons">done</i>
                {{ Session::get('flash_message') }}
            </div>
        </div>
    @endif
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

    <div id="status" class="grid-m-12 grid-s-12 grid-xs-12">

        @if($status == "paid")
            <p>Pagamento realizado com sucesso!</p>
        @else
            <p>Desculpe, ocorreu um erro no pagamento. Por favor contate o administrador sobre o ocorrido. (Erro: {{$status}})</p>
        @endif

        <div class="row">
            <div class="form-group grid-m-3 grid-m-offset-9 grid-s-3 grid-s-offset-9 button-field">
                <a href="{{ url('assinaturas') }}" id="btnVoltar" title="Voltar" class="btn btn-secundary ripple">
                    <span class="text-content">Voltar</span>
                </a>
            </div>
        </div>

    </div>

@stop


@section('script')
    <script type="text/javascript" src="{!! asset('assets/js/assinaturas/scriptPagamento.js') !!}"></script>
    <script type="text/javascript" src="{{url('https://assets.pagar.me/js/pagarme.min.js')}}"></script>
@stop
