@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Tabelascolunas </h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>{{ trans('tabelascolunas.id_tabela1') }}</th><th>{{ trans('tabelascolunas.id_tabela2') }}</th><th>{{ trans('tabelascolunas.coluna1') }}</th><th>{{ trans('tabelascolunas.coluna2') }}</th><th>Ações</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($tabelascolunas as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('admin/tabelascolunas', $item->id) }}">{{ $item->id_tabela1 }}</a></td><td>{{ $item->id_tabela2 }}</td>
                    <td>{{ $item->coluna1 }}</td><td>{{ $item->coluna2 }}</td>
                    <td>
                        <a href="{{ url('/admin/tabelascolunas/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Update</a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/tabelascolunas', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $tabelascolunas->render() !!} </div>
    </div>

</div>
@endsection
