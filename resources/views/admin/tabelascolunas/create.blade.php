
@extends('layouts.app')

@section('content')
    <?php $i=0;?>
<div class="container">

    <h1>Configurar vinculos de colunas das tabelas.</h1>
    <hr/>

    {!! Form::open(['url' => '/admin/tabelascolunas', 'class' => 'form-horizontal']) !!}



                        <div class="col-xs-3">
                        <input type="hidden" name="tabela1" value="{{$tabela[0]}}">

                                        <h2>{{$tabela[0]}}</h2>

                                       @foreach($colunas1 as $item)

                                            <input type="hidden" name="idtabela1{{$i}}" value="{{$idtabela1}}">
                                            <input type="hidden" name="col{{$i++}}" value="{{$item}}">
                                            <label  class="btn btn-default" value="">  {{$tabela[0]}}.{{$item}}</label>
                                           <br><hr/>

                                       @endforeach
                                </div>
                         <input type="hidden" value="{{$i}}" name="qtd">
                        <div class="col-xs-3">
                            <input type="hidden" name="tabela2" value="{{$tabela[1]}}">
                            <h2>{{$tabela[1]}}</h2>
                            @for($x=0;$x<$i;$x++)
                                <input type="hidden" name="idtabela2{{$x}}" value="{{$idtabela2}}">
                                <select name="campo{{$x}}" class="form-control">
                                    <option value="0">Nenhum</option>
                                @foreach($colunas2 as $item)


                                        <option value="{{$item}}">  {{$tabela[1]}}.{{$item}}</option>

                                @endforeach
                                </select>
                                <hr/>
                            @endfor



                        </div>



    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Cadastrar', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

</div>
@endsection