@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Configurações <a href="{{ url('/admin/configuracoes/create') }}" class="btn btn-primary pull-right btn-sm">Cadastrar nova Configuraco</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th><th>{{ trans('configuracoes.titulo') }}</th><th>Ações</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($configuracoes as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('admin/configuracoes', $item->id) }}">{{ $item->titulo }}</a></td>
                    <td>
                        <a href="{{ url('/admin/configuracoes/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Atualizar</a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/configuracoes', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Apagar', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $configuracoes->render() !!} </div>
    </div>

</div>
@endsection
