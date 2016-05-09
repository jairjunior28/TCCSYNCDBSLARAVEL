@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Parametro</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>{{ trans('parametros.id_configuracao') }}</th><th>{{ trans('parametros.host') }}</th><th>{{ trans('parametros.usuario') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $parametro->id }}</td> <td> {{ $parametro->id_configuracao }} </td><td> {{ $parametro->host }} </td><td> {{ $parametro->usuario }} </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
@endsection