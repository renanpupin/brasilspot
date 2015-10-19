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

{!! Form::model($servico,['route' => ['Servico.update',$servico->id], 'method' => 'PUT']) !!}

{!! Form::label('descricao', 'Descrição *',null,['for' => 'descricao']) !!}
{!! Form::text('descricao',$servico->descricao,['id' => 'descricao']) !!}

{!! Form::submit('Alterar',['class' => 'btn btn-primary']) !!}

{!! Form::Close() !!}