@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

{!! Form::Open(['route' => 'Servico.store', 'method' => 'POST']) !!}

    {!! Form::label('descricao', 'Descrição *',null,['for' => 'descricao']) !!}
    {!! Form::text('descricao',null,['id' => 'descricao']) !!}

    {!! Form::submit('Registrar',['class' => 'btn btn-primary']) !!}

{!! Form::Close() !!}