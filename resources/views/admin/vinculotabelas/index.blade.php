@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Vinculotabelas <a href="{{ url('/admin/vinculotabelas/create') }}" class="btn btn-primary pull-right btn-sm">Adicionar Novo Vínculo de tabela</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>{{ trans('vinculotabelas.id_tabela1') }}</th><th>{{ trans('vinculotabelas.id_tabela2') }}</th><th>Ações</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($vinculotabelas as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('admin/vinculotabelas', $item->id) }}">{{ $item->id_tabela1 }}</a></td><td>{{ $item->id_tabela2 }}</td>
                    <td>
                        <a href="{{ url('/admin/vinculotabelas/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Atualizar</a>
                        <a href="{{ url('/admin/tabelascolunas/create?idvtabela=' . $item->id ) }}" class="btn btn-primary btn-xs">Vincular Colunas</a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/vinculotabelas', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Apagar', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $vinculotabelas->render() !!} </div>
    </div>

</div>
@endsection
