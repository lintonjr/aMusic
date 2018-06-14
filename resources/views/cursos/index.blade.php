@extends('adminlte::page')
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Cursos</h3><br>
            <div class="box-tools pull-right">
                <a href="{{route('cursos.create')}}" class="btn btn-primary btn-add"><span class="glyphicon glyphicon-plus"></span> Cadastrar</a>
            </div>
        </div>

        <div class="box-body" >
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th class='text-center' width="300px" >Ações</th>
                            <th>Curso</th>
                            <th>Valor</th>
                            {{-- <th>Remoção</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cursos as $curso)
                            <tr>
                                <td style="white-space:nowrap" class="text-center">
                                    {!! Form::open(['route' => ['cursos.alterar-status', $curso->id], 'method' => 'PUT']) !!}
                                        <a href="{{route('cursos.edit', $curso->id)}}" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                            Editar
                                        </a>

                                        <button href="{{route('cursos.alterar-status', $curso->id)}}" class="btn btn-{{$curso->status ? 'danger' : 'primary'}}">
                                            @if($curso->status)
                                                <i class='fa fa-times-circle' aria-hidden='true'></i>
                                            @else
                                                <i class='fa fa-check-circle' aria-hidden='true'></i>
                                            @endif
                                            {{$curso->status ? 'Inativar' : 'Ativar' }}
                                        </button>
                                    {!! Form::close() !!}
                                </td>
                                <td>{{ $curso->curso }}</td>
                                <td>{{ $curso->valor }}</td>
                                {{-- <td style="white-space:nowrap" class="text-center"><button href="{{route('cursos.destroy', $curso->id)}}" class="btn btn-danger">Deletar</button></td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="box-footer" >
                {!! $cursos->links() !!}
        	</div>
        </div>
    </div>

@endsection
