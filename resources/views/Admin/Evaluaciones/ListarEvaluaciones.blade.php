@extends('Admin.Layout.Main')

@section('content')
<div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Lista de Evaluaciones</h5>
            </div>
            <div class="ibox-content">

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Fecha de inicio</th>
                        <th>Fecha de termino</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 0;?>
                    @foreach( $oEvaluacionesList as $evaluacion)
                    <?php $i++;?>
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $evaluacion->nombre }}</td>
                        <td>{{ $evaluacion->fecha_inicio }}</td>
                        <td>{{ $evaluacion->fecha_termino }}</td>
                        <td><a href="/admin/evaluaciones/editar/{{ $evaluacion->id }}"><i class="fa fa-edit"></i>  editar</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection