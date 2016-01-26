@extends('layouts.master')

@section('title', 'Bem vindo!')

@section('sidebar')
    @parent
    @include('layouts.sidebarSistema')
@stop

@section('content')

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

<form method="POST" action="/Password/reset">
    {!! csrf_field() !!}
    <input type="hidden" name="token" value="{{ $token }}">

    <div>
        <label for="email">Email *</label>
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div>
        <label for="password">Nova Senha *</label>
        <input type="password" name="password">
    </div>

    <div>
        <label for="passwordConfirme">Confirme a senha *</label>
        <input type="password" name="password_confirmation">
    </div>

    <div>
        <button type="submit">
            Reset Senha
        </button>
    </div>
</form>

@endsection