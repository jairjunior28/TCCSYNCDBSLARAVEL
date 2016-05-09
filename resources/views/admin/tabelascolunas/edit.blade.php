@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Edit Tabelascoluna</h1>
    <hr/>

    {!! Form::model($tabelascoluna, [
        'method' => 'PATCH',
        'url' => ['/admin/tabelascolunas', $tabelascoluna->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('id_coluna1') ? 'has-error' : ''}}">
                {!! Form::label('id_coluna1', trans('tabelascolunas.id_coluna1'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('id_coluna1', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('id_coluna1', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('id_coluna2') ? 'has-error' : ''}}">
                {!! Form::label('id_coluna2', trans('tabelascolunas.id_coluna2'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('id_coluna2', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('id_coluna2', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


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