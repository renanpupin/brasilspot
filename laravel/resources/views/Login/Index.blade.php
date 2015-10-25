@extends('layouts.master')

@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @include('layouts.sidebarSistema')
@stop

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"></div>
                    <div class="panel-body">
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
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Email:</label>
                                <div class="col-md-6">
                                    {!! Form::text('email', null, ['class' => 'form-control', 'type' => 'email']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Senha:</label>
                                <div class="col-md-6">
                                    {!! Form::password('password', ['class' => 'form-control']) !!}
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class  ="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember">Lembrar-me
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary" style="margin-right: 15px;">Logar</button>
                                    <a href="/forgot">Esqueci minha senha</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

