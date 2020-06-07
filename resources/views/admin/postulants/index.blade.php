@extends('admin.layouts.app')

@section('htmlheader_title')
   Postulants
@endsection


@section('content')
    <div class="card">
        <div class="card-header">
            <i class="fa fa-align-justify"></i> Postulantes
            @can('create postulants')
                <a class="btn btn-secondary" href="{{ route('admin.users.create') }}">
                    <i class="icon-plus"></i>&nbsp;Nuevo
                </a>
            @endcan
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-sm">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($postulants as $postulant)
                    <tr>
                        <td>{{ $postulant->name }}</td>
                        <td>{{ $postulant->lastname }}</td>
                        <td>{{ $postulant->phone }}</td>
                        <td>{{ $postulant->email }}</td>
                        <td>

                            <a class="btn btn-warning btn-sm" href="{{ route('admin.postulants.show', ['announcement' => $announcement->id, 'postulant' =>$postulant->id]) }}">
                                <i class="icon-pencil"></i>Revisar
                            </a>

                            <form action="{{ route('admin.postulants.destroy', ['announcement' =>$announcement->id, 'postulant' =>$postulant->id]) }}"
                                  style="display:inline-block;"
                                  method="POST">

                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="button" class="btn btn-danger btn-sm"
                                        onclick="delete_action(event);">
                                    <i class="icon-trash"></i>Eliminar
                                </button>
                            </form>

                        </td>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection