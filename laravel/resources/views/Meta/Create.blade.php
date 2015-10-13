{!! Form::Open(['route' => 'Meta.store', 'method' => 'POST']) !!}
    <div class="form-group">
        {!! Form::label('Numero de Empresas:') !!}
        {!! Form::text('numeroEmpresas',null,['class' => 'form-control']) !!}
    </div>
{!! Form::submit('Registrar',['class' => 'btn btn-primary']) !!}

{!! Form::Close() !!}