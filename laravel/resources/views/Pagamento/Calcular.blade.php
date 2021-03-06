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
        <h2>Pagamento</h2>
    </div>

    <div id="breadcrumbs" class="grid-m-12 grid-s-12 grid-xs-12">
        <div class="breadcrumbs-content container">
            <div class="row">
                <i class="material-icons">home</i>
                Você está em:
                <ul>
                    <li><a href="{{ url('Pagamento/Calcular') }}">Calcular Pagamento de Assinaturas</a></li>
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

    <div id="selecao" class="grid-m-12 grid-s-12 grid-xs-12">
        @if ($values)
            {!! Form::Open(['url' => 'Pagamento/InfoCartao', 'method' => 'POST']) !!}
                <table id="listaFiliais" class="table">
                    <thead>
                        <th></th>
                        <th>Descrição</th>
                        <th>Validado até</th>
                        <th>Valor</th>
                    </thead>
                    <tbody>
                        @foreach ($values as $key => $value)
                            <tr>
                                <td>
                                    {!! Form::checkbox("checkbox[]", $value->id, ["checked" => "true" ] ) !!}
                                </td>
                                <td>{{ $value->nomeFantasia }}</td>
                                <td>{{ $value->validade }}</td>
                                <td>
                                    {!! Form::text("value[]", "R$ ".$value->valor, ["checked" => "true", "readonly" => "readonly", "class" => "valores1" ] ) !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3">Total :</th>
                            <td>
                                {!! Form::text("totalTotalis", "R$ ".$value->valor, ["readonly" => "readonly", "id" => "idTotal" ] ) !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
                {!! Form::button('<span class="text-content">Enviar</span>',
                        ['id' => 'btnCadastrar','name' => 'btnprox' , 'type' => 'submit', 'class' => 'btn btn-primary ripple']
                    )
                !!}
            {!! Form::Close() !!}
        @else
            <h4> Nenhuma assinatura disponivel para pagamento ainda, verifique 10 dias antes do vencimento.</h4>
        @endif

    </div>

@stop


@section('script')
    <script type="text/javascript" src="{{ asset('assets/js/Pagamento/jsCalcularSum.js') }}"></script>
@stop
