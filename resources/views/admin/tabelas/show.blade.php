@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Tabela</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>{{ trans('tabelas.id_configuracao') }}</th><th>{{ trans('tabelas.id_parametro') }}</th><th>{{ trans('tabelas.nome') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $tabela->id }}</td> <td> {{ $tabela->id_configuracao }} </td><td> {{ $tabela->id_parametro }} </td><td> {{ $tabela->nome }} </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
@endsection