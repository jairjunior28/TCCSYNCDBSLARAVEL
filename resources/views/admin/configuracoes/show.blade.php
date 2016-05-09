@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Configuração</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>{{ trans('configuracoes.titulo') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $configuraco->id }}</td> <td> {{ $configuraco->titulo }} </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
@endsection