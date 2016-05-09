@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Vinculotabela</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>{{ trans('vinculotabelas.id_tabela1') }}</th><th>{{ trans('vinculotabelas.id_tabela2') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $vinculotabela->id }}</td> <td> {{ $vinculotabela->id_tabela1 }} </td><td> {{ $vinculotabela->id_tabela2 }} </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
@endsection