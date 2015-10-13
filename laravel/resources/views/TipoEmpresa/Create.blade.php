{!! Form::Open(['route' => 'TipoEmpresa.store', 'method' => 'POST']) !!}

<div class="form-group">
    {!! Form::label('Tipo:') !!}
    {!! Form::text('tipo',null,['class' => 'form-control']) !!}
</div>
{!! Form::submit('Registrar',['class' => 'btn btn-primary']) !!}

{!! Form::Close() !!}