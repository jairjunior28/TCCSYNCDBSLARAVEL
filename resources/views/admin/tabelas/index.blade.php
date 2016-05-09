@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Tabelas <a href="{{ url('/admin/tabelas/create') }}" class="btn btn-primary pull-right btn-sm">Cadastrar Nova Tabela</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>{{ trans('tabelas.id_configuracao') }}</th><th>{{ trans('tabelas.id_parametro') }}</th><th>{{ trans('tabelas.nome') }}</th><th>Ações</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($tabelas as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('admin/tabelas', $item->id) }}">{{ $item->id_configuracao }}</a></td><td>{{ $item->id_parametro }}</td><td>{{ $item->nome }}</td>
                    <td>
                        <a href="{{ url('/admin/tabelas/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Atualizar</a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/tabelas', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Apagar', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $tabelas->render() !!} </div>
    </div>

</div>
@endsection
