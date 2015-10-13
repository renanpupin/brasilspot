{!! Form::Open(['route' => 'Plano.store', 'method' => 'POST']) !!}

<div class="form-group">
    {!! Form::label('Nome:') !!}
    {!! Form::text('nome',null,['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Descricao') !!}
    {!! Form::text('descricao',null,['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Valor:') !!}
    {!! Form::text('valor',null,['class' => 'form-control']) !!}
</div>
{!! Form::submit('Registrar',['class' => 'btn btn-primary']) !!}

{!! Form::Close() !!}