@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Cadastrar novo Parâmetro</h1>
    <hr/>

    {!! Form::open(['url' => '/admin/parametros', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('id_configuracao') ? 'has-error' : ''}}">
                {!! Form::label('id_configuracao', trans('parametros.id_configuracao'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">

                    {!! Form::select('id_configuracao',$configuracoes::lists('titulo','id') , ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('id_configuracao', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('host') ? 'has-error' : ''}}">
                {!! Form::label('host', trans('parametros.host'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('host', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('host', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('usuario') ? 'has-error' : ''}}">
                {!! Form::label('usuario', trans('parametros.usuario'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('usuario', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('usuario', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('senha') ? 'has-error' : ''}}">
                {!! Form::label('senha', trans('parametros.senha'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('senha', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('senha', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('banco') ? 'has-error' : ''}}">
                {!! Form::label('banco', trans('parametros.banco'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('banco', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('banco', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Cadastrar', ['class' => 'btn btn-primary form-control']) !!}
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