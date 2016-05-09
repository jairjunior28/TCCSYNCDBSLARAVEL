@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Edit Vinculotabela</h1>
    <hr/>

    {!! Form::model($vinculotabela, [
        'method' => 'PATCH',
        'url' => ['/admin/vinculotabelas', $vinculotabela->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('id_tabela1') ? 'has-error' : ''}}">
                {!! Form::label('id_tabela1', trans('vinculotabelas.id_tabela1'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('id_tabela1',$tabela::lists('nome','id') , ['class' => 'form-control', 'required' => 'required','id'=>'id_configuracao','value'=>$tabela->id]) !!}
                    {!! $errors->first('id_tabela1', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('id_tabela2') ? 'has-error' : ''}}">
                {!! Form::label('id_tabela2', trans('vinculotabelas.id_tabela2'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('id_tabela2',$tabela::lists('nome','id') , ['class' => 'form-control', 'required' => 'required','id'=>'id_configuracao','value'=>$tabela->id]) !!}
                    {!! $errors->first('id_tabela2', '<p class="help-block">:message</p>') !!}
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