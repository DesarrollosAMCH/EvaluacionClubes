@extends('Admin.Layout.Main')

@section('content')
    <div class="col-lg-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Lista de Clubes inscritos</h5>
            </div>
            <div class="ibox-content">

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Zona</th>
                        <th>Campo</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 0;?>
                    @foreach( $oClubesList as $club)
                    <?php $i++;?>
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $club->nombre }}</td>
                        <td>{{ $club->zona()->get()->first()->nombre }}</td>
                        <td>{{ $club->campo()->get()->first()->nombre }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection