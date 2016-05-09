@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Parâmetros <a href="{{ url('/admin/parametros/create') }}" class="btn btn-primary pull-right btn-sm">Cadastrar novo Parâmetro</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th><th>{{ trans('Configuração') }}</th><th>{{ trans('parametros.host') }}</th><th>{{ trans('parametros.usuario') }}</th><th>{{ trans('Banco') }}</th><th>{{ trans('Ações') }}</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($parametros as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('admin/parametros', $item->id) }}">{{ $item->id_configuracao }}</a></td><td>{{ $item->host }}</td><td>{{ $item->usuario }}</td><td>{{ $item->banco }}</td>
                    <td>
                        <a href="{{ url('/admin/parametros/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Atualizar</a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/parametros', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Apagar', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $parametros->render() !!} </div>
    </div>

</div>
@endsection
