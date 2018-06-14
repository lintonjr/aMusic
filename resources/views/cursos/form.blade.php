@extends('adminlte::page')
@section('content')
    <div class="box box-primary">
        <div class="box-body" >
            @if ($cursos->exists)
                {!! Form::model($cursos, ['route'=> ['cursos.update', $cursos->id], 'class'=>'form','method'=>'put']) !!}
            @else
                {!! Form::open(['route'=>'cursos.store', 'class'=>'form']) !!}
            @endif

        <div class="row">
            <div class="form-group col-md-6">
                {!! Form::label('curso', 'Curso') !!}
                {!! Form::text('curso',null,['class'=>'form-control','placeholder'=>'Curso']) !!}
            </div>

            <div class="form-group col-md-6">
                {!! Form::label('valor', 'Valor') !!}
                {!! Form::text('valor',null,['class'=>'form-control','placeholder'=>'Valor']) !!}
            </div>
        </div>
        <div class="row">
            {!! Form::button('<i class="glyphicon glyphicon-ok"> Salvar</i>', array('type' => 'submit', 'class' => 'btn btn-primary')) !!}
            {!! Form::close() !!}
            <a href="{{route('cursos.index')}}" class="btn btn-default btn-add"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>

        </div>

        </div>
    </div>
@stop
