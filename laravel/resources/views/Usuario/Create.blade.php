{!! Form::Open(['route' => 'Usuario.store', 'method' => 'POST']) !!}

<div class="form-group">
    {!! Form::label('Nome:') !!}
    {!! Form::text('name',null,['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('E-mail:') !!}
    {!! Form::text('email',null,['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('Senha:') !!}
    {!! Form::password('password',null,['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('Perfis de Usuario:') !!}
    {!! Form::select('perfis', $perfis) !!}
</div>

<div class="form-group">
    {!! Form::label('Vendedor?') !!}
    {!! Form::checkbox('isVendedor') !!}
</div>

{!! Form::submit('Registrar',['class' => 'btn btn-primary']) !!}

{!! Form::Close() !!}