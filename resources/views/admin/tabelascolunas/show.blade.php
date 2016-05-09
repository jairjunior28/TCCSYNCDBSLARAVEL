@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Tabelascoluna</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>{{ trans('tabelascolunas.id_tabela1') }}</th><th>{{ trans('tabelascolunas.id_tabela2') }}</th>
                    <th>{{ trans('tabelascolunas.coluna1') }}</th><th>{{ trans('tabelascolunas.coluna2') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $tabelascoluna->id }}</td> <td> {{ $tabelascoluna->id_tabela1 }} </td><td> {{ $tabelascoluna->id_tabela2 }} </td>
                    <td> {{ $tabelascoluna->coluna1 }} </td><td> {{ $tabelascoluna->coluna2 }} </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
@endsection