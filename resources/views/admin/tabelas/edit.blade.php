@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Edit Tabela</h1>
    <hr/>

    {!! Form::model($tabela, [
        'method' => 'PATCH',
        'url' => ['/admin/tabelas', $tabela->id],
        'class' => 'form-horizontal'
    ]) !!}

    <div class="form-group {{ $errors->has('id_configuracao') ? 'has-error' : ''}}">
        {!! Form::label('id_configuracao', trans('tabelas.id_configuracao'), ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::select('id_configuracao',$configuracoes::lists('titulo','id') , ['class' => 'form-control', 'required' => 'required','id'=>'id_configuracao','value'=>$tabela->id]) !!}

            {!! $errors->first('id_configuracao', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('id_parametro') ? 'has-error' : ''}}">
        {!! Form::label('id_parametro', trans('Host/Banco'), ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6" >

            <select name="id_parametro" class="form-control"  id="id_parametro" required="required">
                <option >Selecione...</option>
                @foreach($parametros->all() as $item)
                    <option value="{{$item->id}}">{{$item->host}}/{{$item->banco}}</option>

                @endforeach
            </select>





            {!! $errors->first('id_parametro', '<p class="help-block">:message</p>') !!}
        </div>
    </div>



    {{--print_r($param)--}}
    <div class="form-group {{ $errors->has('nome') ? 'has-error' : ''}}">

        {!! Form::label('nome', trans('tabelas.nome'), ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            <select name="nome" id="nome" class="form-control" required="required">
                <option value="">Selecione...</option>
            </select>

            {!! $errors->first('nome', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script>
        $('#id_parametro').change(function (e) {
            console.log(e);
            var id_parametro=e.target.value;
            $.get('/ajax-tabela?id_parametro='+id_parametro, function (data) {
                $('#nome').empty();
                $.each(data, function(index,idtabelaObj){
                    $('#nome').append('<option value="'+idtabelaObj[0]+'">'+idtabelaObj[0]+'</option>');

                });

                console.log(data);


            });
        });
    </script>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

</div>
@endsection