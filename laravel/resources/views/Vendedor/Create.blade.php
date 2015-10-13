{!! Form::Open(['route' => 'Vendedor.store', 'method' => 'POST']) !!}

<div class="form-group">
    {!! Form::label('Coordenador?') !!}
    {!! Form::checkbox('isCoordenador') !!}
</div>

<div class="form-group">
    {!! Form::label('Usuarios:') !!}
    {!! Form::select('usuarios', $usuarios) !!}
</div>

<div class="form-group">
    {!! Form::label('Tipos Vendedor:') !!}
    {!! Form::select('tipos', $tipos) !!}
</div>

<div class="form-group">
    {!! Form::label('Metas:') !!}
    {!! Form::select('metas', $metas) !!}
</div>

<div class="form-group">
    {!! Form::label('Vendedor Pai:') !!}
    {!! Form::select('vendedorPai', $usuarios) !!}
</div>

{!! Form::submit('Registrar',['class' => 'btn btn-primary']) !!}

{!! Form::Close() !!}